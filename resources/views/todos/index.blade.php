@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-5">
        <form action="{{ route('tareas') }}" method="POST">
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
            <input type="text" name="title" class="form-control" id="title" aria-describedby="tarea">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" id="category_id" class="form-select">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->category }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mx-auto text-center d-flex justify-content-center">Crear nueva tarea</button>
        </form>
        <div class="mt-4">
            @foreach ($todos as $todo)
                <div class="row py-1 bg-light">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('todo-edit', ['id' => $todo->id ]) }}">
                            {{ $todo->title }}
                        </a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('todo-destroy', [$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection