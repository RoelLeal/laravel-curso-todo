@extends('app')
@section('content')
<div class="container w-25 border p-4 mt-5">
        <form action="{{ route('categories.store') }}" method="POST">
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
            <label for="category" class="form-label">Categorias</label>
            <input type="text" name="category" class="form-control" id="category" aria-describedby="category">
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="color" name="color" class="form-control" id="color" aria-describedby="color">
        </div>
        <button type="submit" class="btn btn-success mx-auto text-center d-flex justify-content-center">Crear nueva categoria</button>
        </form>
        <div class="mt-4">
            @foreach ($categories as $category)
                <div class="row py-1 bg-light">
                    <div class="col-md-9 d-flex align-items-center">
                        <a class="gap-2 align-items-center d-flex text-dark" href="{{ route('categories.show', ['category' => $category->id ]) }}">
                            <span class="color-container" style="color: {{ $category->color }}">■</span>
                            {{ $category->category }}
                        </a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $category->id }}">
                            Eliminar
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1" aria-labelledby="modal-" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modal">¿Estás seguro?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Se eliminaran todas las tareas que pertenezcan a <strong> {{ $category->category }} </strong>,
                            ¿Quieres continuar?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection