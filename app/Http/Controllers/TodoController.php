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
        return view('todos.index', [
            'todos' => $todos
        ]);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function edit($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return to_route('todos.index')->withErrors(["msg" => "No Todo Found!"]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    public function store(TodoRequest $request)
    {
        $request->validated();
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 1
        ]);
        Session()->flash('alert-success', 'Todo Created Successfully!');
        return redirect('todos/index');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return to_route('todos.index')->withErrors(["msg" => "No Todo Found!"]);
        }
        return view('todos.show', ['todo' => $todo]);
    }

    public function update(TodoRequest $request)
    {
        // Debug statement to check if the method is reached
        // dd('Update method reached');

        // Find the todo
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            return redirect()->route('todos.index')->withErrors(['error' => 'No Todo Found!']);
        }

        // Debug statement to check the form data
        // dd($request->all());

        // Update the todo
        $todo->update([
            'title' => $request->title,
            'description' => $request -> description,
            'is_completed' => $request -> is_completed 
        ]);

        // Flash success message
        session()->flash('alert-info', 'Todo updated Successfully!');

        // Redirect back to the index page
        return redirect()->route('todos.index');
    }



}