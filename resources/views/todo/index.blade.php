@extends('layouts.app')

@section('content')

    <todo
        :todo-data="{{ $todos }}"
    ></todo>

@endsection
