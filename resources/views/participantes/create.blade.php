@extends('layout/template')

@section('title', 'Registrar Participante')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Registrar Participante</h2>

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

        <form action="{{ url('participantes') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="surname" class="col-sm-2 col-form-label">Apellidos:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="surname" id="surname" value="{{ old('surname') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="dni" class="col-sm-2 col-form-label">DNI:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="dni" id="dni" value="{{ old('dni') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="mesa" class="col-sm-2 col-form-label">Mesa:</label>
                <div class="col-sm-5">
                    <select name="mesa" id="mesa" class="form-select" required>
                        <option value="">Selecciona una mesa</option>
                        @foreach ($mesas as $mesa)
                            <option value="{{ $mesa->id }}">{{ $mesa->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-6">
                    <a href="{{ url('participantes') }}" class="btn btn-secondary">Volver</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                
            </div>
            
        </form>
    </div>
</main>