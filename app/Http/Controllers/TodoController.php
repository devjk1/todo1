<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use App\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, TodoList $todoList)
    {
        $todos = Todo::where('user_id', $user->id)
            ->where('todo_list_id', $todoList->id)
            ->get();

        return $todos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, TodoList $todoList)
    {
        return view('todo.create', compact('user', 'todoList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, TodoList $todoList)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'due_at' => 'required',
        ])->validate();

        /* $newTodo = new Todo;
        $newTodo->user_id = $user->id;
        $newTodo->todo_list_id = $todoList->id;
        $newTodo->fill($request->all())->save(); */
        $newTodo = new Todo;
        $newTodo->user_id = $user->id;
        $newTodo->todo_list_id = $todoList->id;
        $newTodo->description = $request->description;
        $newTodo->due_at = $request->due_at;
        $newTodo->save();

        return redirect()->action('TodoListController@index', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, TodoList $todoList, Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, TodoList $todoList, Todo $todo)
    {
        $editedTodo = Todo::find($todo->id);

        if ($request->input('completed', 1)) {
            $editedTodo->completed = 1;
            $editedTodo->save();
        } else {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
                'due_at' => 'required',
            ])->validate();

            $editedTodo->description = $request->description;
            $editedTodo->due_at = $request->due_at;
            $editedTodo->save();

            return redirect()->action('TodoListController@index', compact('user'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, TodoList $todoList, Todo $todo)
    {
        Todo::where('id', $todo->id)->delete();
    }
}
