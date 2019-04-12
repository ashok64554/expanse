<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Expense extends Model
{
    protected $fillable = [
        'emp_id','category','expense_description','date','pre_tax_amount','tax_amount'
    ];

    public function getEmpInfo()
	{
		return $this->belongsTo(User::class,  'emp_id', 'id');
	}
}
