<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TodoList;
use App\Todo;
use League\Csv\Writer;

class ExportTodoListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user, TodoList $todoList)
    {
        $path = app_path() . '/ExportedCsvs/exported_todo_list_' . date("Y-m-dh:m:s") . '.csv';
        $writer = Writer::createFromPath($path, 'w+');
        $records = Todo::where('todo_list_id', $todoList->id)->get();
        $header = ['id', 'user_id', 'todo_list_id', 'description', 'due_at', 'completed', 'created_at', 'updated_at'];
        $writer->insertOne($header);

        foreach ($records as $record) {
            $writer->insertOne($record->toArray());
        }
    }
}
