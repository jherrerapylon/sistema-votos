@extends('layout/template')

@section('title', 'Participantes')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Listado de Participantes</h2>

        <a href="{{ url('participantes/create') }}" class="btn btn-primary btn-sm">Nuevo</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Mesa</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($participantes as $participante)
                    <tr>
                        <td>{{ $participante->name }}</td>
                        <td>{{ $participante->surname }}</td>
                        <td>{{ $participante->dni }}</td>
                        <td>{{ $participante->mesa->name }}</td>
                        <td>
                            <a href="{{ url('participantes/'.$participante->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{ url('participantes/'.$participante->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</main>