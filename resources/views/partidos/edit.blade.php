@extends('layout/template')

@section('title', 'Editar Partido político')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Editar Partido político</h2>

        @if ($errors->any())
            <div class="alert alert-danger my-4">
                <h5>Por favor corrige los siguientes errores:</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul> 
            </div>
        @endif

        @if (isset($msg))
            <div class="alert alert-success my-4">
                <h5>{{ $msg }}</h5>
            </div>
        @endif

        <form action="{{ url('partidos/'.$partido->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $partido->name}}">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-6">
                    <a href="{{ url('partidos') }}" class="btn btn-secondary">Volver</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                
            </div>
            
        </form>
    </div>
</main>