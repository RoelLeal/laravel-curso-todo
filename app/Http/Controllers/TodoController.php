<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    //Storage To do's
    public function storeTodo(Request $request) {
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('tareas')->with('success',
         'Tarea creada correctamente');
    }

    public function index() {
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos], ['categories' => $categories]);
    }

    public function show($id) {
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id) {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();
        //return view('todos.index', ['success' => 'Tarea actualizada!']);
        return redirect()->route('tareas')->with('success',
         'Tarea actualizada correctamente');
    }

    public function destroy($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('tareas')->with('success',
         'Tarea eliminada creada correctamente');
    }
}