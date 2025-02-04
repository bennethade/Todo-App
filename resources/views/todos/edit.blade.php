@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                </div>
                

                <div class="card-body">

                    <h4>Edit Todo</h4>
                    <form method="POST" action="{{ route('todos.update') }}">
                        {{-- @method('PUT') --}}
                        @csrf
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" id="" cols="5" rows="5" class="form-control" >
                            {{ $todo->description }}
                          </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select class="form-control" name="is_completed" id="">
                                <option value="">Select Option</option>
                                <option value="1">Completed</option>
                                <option value="0">Incompleted</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
