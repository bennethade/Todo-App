@extends('layouts.app')

@section('styles')
    <style>
        #outer
        {
            width: auto;
            text-align: center;
        }
        .inner
        {
            display: inline-block;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-warning" role="alert">{{ Session::get('error') }}</div>
                    @endif

                    <a class="btn btn-sm btn-info" href="{{ route('todos.create') }}">Create Todo</a>
                        @if (count($todos) > 0)
                        <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Completed</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
  
                              @foreach ($todos as $key => $todo)
                              <tr>
                                  <td scope="row">{{ $key+1 }}</td>
                                  <td>{{ $todo->title }}</td>
                                  <td>{{ $todo->description }}</td>
                                  <td>
                                    @if ( $todo->is_completed == 1)
                                        <a href="" class="btn btn-sm btn-success">Completed</a>
                                    @else
                                        <a href="" class="btn btn-sm btn-warning">In completed</a>
                                    @endif
                                  </td>
                                  <td id="outer">
                                    <a href="{{ route('todos.view',$todo->id) }}" class="inner btn btn-sm btn-success">View</a>
                                    <a href="{{ route('todos.edit',$todo->id) }}" class="inner btn btn-sm btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('todos.delete') }}" class="inner">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="todo_id" id="" value="{{ $todo->id }}">
                                        <input type="submit" name="" id="" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                            
                          </tbody>
                        </table>
                        @else
                          <h2>No Todos Are Created Yet</h2>
                        @endif
                      



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
