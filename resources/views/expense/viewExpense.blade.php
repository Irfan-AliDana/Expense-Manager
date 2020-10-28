@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Expenses') }}</div>

                <div class="card-body">

                    @if(session('update'))
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="alert alert-success text-center">
                                    <strong>{{session('update')}}</strong>
                                </div>
                            </div>
                        </div>
                    @endif 

                    @if(session('delete'))
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="alert alert-danger text-center">
                                    <strong>{{session('delete')}}</strong>
                                </div>
                            </div>
                        </div>
                    @endif 
                    
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <td>ID</td>
                                <td>Type</td>
                                <td>Amount</td>
                                <td>Date</td>
                                <td>Description</td>
                                <td colspan="2">Actions</td>
                            </tr>
                            @foreach($expenses as $expense)
                                <tr>
                                    <td>
                                        {{$expense->id}}
                                    </td>
                                    <td>
                                        {{$expense->type}}
                                    </td>
                                    <td>
                                        {{$expense->amount}}
                                    </td>
                                    <td>
                                        {{$expense->date}}
                                    </td>
                                    <td>
                                        {{$expense->description}}
                                    </td>
                                    <td>
                                        <a href="/expense/{{$expense->id}}/update" style="text-decoration: none;"><button class="btn btn-block btn-success">Update</button></a>
                                    </td>
                                    <td>
                                        <a href="/expense/{{$expense->id}}/delete" style="text-decoration: none;"><button class="btn btn-block btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection