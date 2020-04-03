@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('todolist.store', Auth::user()) }}">
            @csrf

            <div class="form-group">
                <label  for="title">TodoList Title</label>
                <input  id="title"
                        name="title"
                        type="text"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        value="{{ old('title') }}"
                >
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection
