@extends('layouts.app')

@section('content')
    <todo-container
        :user="{{ Auth::user() }}"
    ></todo-container>
@endsection
