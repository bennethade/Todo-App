@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info pull-right">Go Back</a> <br>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <b>Your Todo Title is: </b>{{ $todo->title }} <br>
                    <b>Your Todo Description is: </b>{{ $todo->description }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
