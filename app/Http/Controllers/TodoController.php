<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index',compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        // METHOD 1, LINKING TO DATABASE
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->is_completed = 0;
        $todo->save();


        // USE THIS TO SEE IF EVERY FIELD IS WORKING
        // return $request->all();


        // $request->validated();

        // METHOD 2, LINKING TO DATABASE
        // Todo::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'is_completed' => 0
        // ]);

        session()->flash('message','Todo Created Successfully!');
        return redirect()->route('todos.index');
    }


    public function view($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            session()->flash('error','Unable to find the Todo');
            return to_route('todos.index');
        }
        return view('todos.view',['todo'=>$todo]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            session()->flash('error','Unable to find the Todo');
            return to_route('todos.index');
        }
        return view('todos.edit',['todo'=>$todo]);
    }

    public function update(TodoRequest $request)
    {
        // return $request->all();

        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            session()->flash('error','Unable to find the Todo');
            return to_route('todos.index');
        }

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed
        ]);
        
        session()->flash('message','Todo Has Been Updated Successfully!');
        return redirect()->route('todos.index');
        
    }


    public function delete(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            session()->flash('error','Unable to find the Todo');
            return to_route('todos.index');
        }

        // dd($todo);

        $todo->delete();
        session()->flash('message','Todo Has Been Deleted Successfully!');
        return redirect()->route('todos.index');
    }


}
