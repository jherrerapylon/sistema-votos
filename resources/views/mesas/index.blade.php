@extends('layout/template')

@section('title', 'Mesas Electorales')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Listado de Mesas Electorales</h2>

        <a href="{{ url('mesas/create') }}" class="btn btn-primary btn-sm">Nueva</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($mesas as $mesa)
                    <tr>
                        <td>{{ $mesa->name }}</td>
                        <td>{{ $mesa->address }}</td>
                        <td>
                            <a href="{{ url('mesas/'.$mesa->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{ url('mesas/'.$mesa->id) }}" method="post">
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