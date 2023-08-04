@extends('layout/template')

@section('title', 'Recuento de votaciones')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Recuento de votaciones</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($partidos as $partido)
                    <tr>
                        <td>{{ $partido->name }}</td>
                        <td>
                            <form action="{{ url('/recuento/'.$partido->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <span>{{ $partido->votes }}</span>
                                <button type="submit" class="btn btn-success btn-sm">+</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> 

        </table>

        <div class="container">
            <div class="row">
                <div class="col-8">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="col-4">
                    <canvas id="circleChart"></canvas>
                </div>
            </div>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        const ctx = document.getElementById('barChart');
    
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($partidos as $partido)
                        '{{ $partido->name }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                        @foreach($partidos as $partido)
                            {{ $partido->votes }},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach($partidos as $partido)
                                // random color
                                'rgb({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }})',
                            @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('circleChart');
    
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: [
                    @foreach($partidos as $partido)
                        '{{ $partido->name }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                        @foreach($partidos as $partido)
                            {{ $partido->votes }},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach($partidos as $partido)
                                // random color
                                'rgb({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }})',
                            @endforeach
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</main>