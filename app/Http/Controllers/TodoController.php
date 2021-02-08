<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        return Todo::latest()->get();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required'
            ],
            [
                'title.required' => 'Todo input field is reuired!'
            ]
        );
        Todo::create($request->all());
    }


    public function show(Todo $todo)
    {
        //
    }


    public function edit(Todo $todo)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        $todo->save();
    }


    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return Todo::latest()->get();
    }
}
