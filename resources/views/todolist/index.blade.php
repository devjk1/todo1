@extends('layouts.app')

@section('content')
    <todo-container
        :lists="{{ $todoLists }}"
        :user="{{ Auth::user() }}"
    ></todo-container>
@endsection
