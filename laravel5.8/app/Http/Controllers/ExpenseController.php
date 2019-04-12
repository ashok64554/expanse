<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Expense;
use App\Category;

class ExpenseController extends Controller
{
    public function index()
    {
    	$expenses = Expense::where('emp_id', Auth::id())->get();
    	if(Auth::user()->user_type=='admin')
    	{
    		$expenses = Expense::get();
    	}
    	return view('expense.index', compact('expenses'));
    }

    public function create()
    {
    	$categories = Category::get();
    	return view('expense.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'category'	=> ['required', 'string', 'max:191'],
            'expense_description'	=> ['required', 'string', 'max:191'],
            'date'             		=> ['required', 'date'],
            'pre_tax_amount'        => ['required', 'numeric'],
            'tax_amount'           	=> ['required', 'numeric']
        ]);

    	$expense = new Expense;
    	$expense->emp_id = Auth::id();
    	$expense->category 				= $request->category;
    	$expense->expense_description 	= $request->expense_description;
    	$expense->date 					= $request->date;
    	$expense->pre_tax_amount 		= $request->pre_tax_amount;
    	$expense->tax_amount 			= $request->tax_amount;
    	$expense->save();

    	return redirect()->route('expense')->with('success', 'Expense successfully added.');
    }
}
