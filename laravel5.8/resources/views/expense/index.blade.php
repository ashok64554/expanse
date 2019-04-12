@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    {{\Session::get('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Expense</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-uppercase">date</th>
                                <th class="text-uppercase">category</th>
                                <th class="text-uppercase">employee name</th>
                                <th class="text-uppercase">employee address</th>
                                <th class="text-uppercase">expense description</th>
                                <th class="text-uppercase">pre tax amount</th>
                                <th class="text-uppercase">tax amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $expense)
                            <tr>
                                <td>{{ date("d/m/Y", strtotime($expense->date)) }}</td>
                                <td>{{ $expense->category }}</td>
                                <td>{{ $expense->getEmpInfo->name }}</td>
                                <td>{{ $expense->getEmpInfo->address }}</td>
                                <td>{{ $expense->expense_description }}</td>
                                <td>{{ $expense->pre_tax_amount }}</td>
                                <td>{{ $expense->tax_amount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection