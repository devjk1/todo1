@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('todo.store', ['user' => $user, 'todoList' => $todoList]) }}">
            @csrf

            <div class="form-group">
                <label  for="description">Todo Description</label>
                <input  id="description"
                        name="description"
                        type="text"
                        class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        value="{{ old('description') }}"
                >
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label  for="due_at">Due date</label>
                <input  id="due_at"
                        name="due_at"
                        type="text"
                        class="form-control {{ $errors->has('due_at') ? 'is-invalid' : '' }}"
                        value="{{ old('due_at') }}"
                >
                @if ($errors->has('due_at'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('due_at') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection
