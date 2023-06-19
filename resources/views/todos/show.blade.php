@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-5">
        <form action="{{ route('todo-update', ['id' => $todo->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h6>{{ session('success') }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @error('title')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h6>{{ $message }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
            <div class="mb-3">
                <label for="tarea" class="form-label">Tarea</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="tarea" value="{{ $todo->title }}">
            </div>
            <button type="submit" class="btn btn-success mx-auto text-center d-flex justify-content-center">Actualizar tarea</button>
        </form>
@endsection