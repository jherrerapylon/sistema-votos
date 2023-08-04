@extends('layout/template')

@section('title', 'Sistema de Votos')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Sistema de Votos para la mesa {{$mesa->name}}</h2>

        {{--  Listado de participantes pendientes de votar --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendientes as $participante)
                    <tr>
                        <td>{{ $participante->name }}</td>
                        <td>{{ $participante->surname }}</td>
                        <td>{{ $participante->dni }}</td>
                        <td>
                            <form action="{{ url('/votos/participante/'.$participante->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-sm">Votar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mb-3 row">
            <div class="col-6">
                <a href="{{ url('mesas') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</main>