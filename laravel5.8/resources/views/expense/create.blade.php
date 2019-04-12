@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <div class="card">
                <div class="card-header">Create Expense</div>

                <div class="card-body">
                    <form method="post" action="{{route('store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category" id="category" required="">
                                        <option value="" selected="" disabled="">-- Select --</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" id="date" required="" value="{{date('Y-m-d')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="expense_description">Expense description</label>
                                    <textarea rows="3" class="form-control" name="expense_description" id="expense_description" required=""></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pre_tax_amount">Pre tax amount</label>
                                    <input type="number" class="form-control" name="pre_tax_amount" id="pre_tax_amount" required="" min="0" step="any" onkeyup="calTax(this.value)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_amount">Tax amount</label>
                                    <input type="number" class="form-control" name="tax_amount" id="tax_amount" required="" min="0" step="any">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function calTax(pre_tax_amount)
        {
            var tax_rate = 13.3334;
            document.getElementById("tax_amount").value = (pre_tax_amount/tax_rate).toFixed(2);
        }
    </script>
    @endsection
