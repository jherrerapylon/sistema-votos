@extends('layout/template')

@section('title', 'Partidos políticos')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Listado de Partidos políticos</h2>

        <a href="{{ url('partidos/create') }}" class="btn btn-primary btn-sm">Nuevo</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($partidos as $partido)
                    <tr>
                        <td>{{ $partido->name }}</td>
                        <td>
                            <a href="{{ url('partidos/'.$partido->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{ url('partidos/'.$partido->id) }}" method="post">
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