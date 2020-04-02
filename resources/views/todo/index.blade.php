@extends('layouts.app')

@section('content')
    <div class="container">
        <a  href="{{ route('todo.create', Auth::user()) }}"
            class="row btn btn-outline-primary"
        >
            Create
        </a>
        <todo
            :todo-data="{{ $todos }}"
        ></todo>
    </div>
@endsection
