@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-5">
        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h6>{{ session('success') }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @error('category')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h6>{{ $message }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
            <div class="mb-3">
                <label for="tarea" class="form-label">Categoria</label>
                <input type="text" name="category" class="form-control" id="title" aria-describedby="category" value="{{ $category->category }}">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" name="color" class="form-control" id="color" aria-describedby="color">
            </div>
            <button type="submit" class="btn btn-success mx-auto text-center d-flex justify-content-center">Actualizar categoria</button>
        </form>
        <div>
            @if ($category->todos->count() > 0)
                @foreach($category->todos as $todo)
                    <div class="row py-3">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('todo-update', ['id' => $todo->id]) }}">
                                {{ $todo->title }}
                            </a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('todo-destroy', ['id' => $todo->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <h6 class="text-center pt-4 text-danger">
                    No hay tareas en esta categoria
                </h6>
            @endif
        </div>
    </div>
@endsection