@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Expense') }}</div>

                <div class="card-body">

                    <form method="POST" action="/expense/{{$expense->id}}/update">
                        @csrf

                        @if(session('update'))
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-success text-center">
                                        <strong>{{session('update')}}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif 

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" 

                                @if(old('type'))
                                    value="{{ old('type') }}"
                                @elseif(isset($expense->type))
                                    value="{{ $expense->type }}"
                                @endif 
                                >

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Expense Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                                   
                                @if(old('date'))
                                    value="{{ old('date') }}"
                                @elseif(isset($expense->date))
                                    value="{{ $expense->date }}"
                                @endif 
                                >

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"
                                
                                @if(old('amount'))
                                    value="{{ old('amount') }}"
                                @elseif(isset($expense->amount))
                                    value="{{ $expense->amount }}"
                                @endif 
                                >
                                
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                >@if(old('description')){{ old('description')}}@elseif(isset($expense->description)){{ $expense->description }}
                                @endif</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
