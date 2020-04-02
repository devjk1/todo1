@extends('layouts.app')

@section('content')
    <todo-container
        :lists="{{ $todoLists }}"
    ></todo-container>
@endsection
