<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contratos</title>
    <!-- Agrega aquí tus enlaces a CSS y otros recursos si los tienes -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Contratos</h1>
        <a href="{{ route('contratos.create') }}" class="btn btn-primary mb-3">Agregar Contrato</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Número de Contrato</th>
                    <th>Nombre del Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contratos as $contrato)
                    <tr>
                        <td>{{ $contrato->contract_number }}</td>
                        <td>
                            @if($contrato->client)
                                {{ $contrato->client->name }}
                            @else
                                Cliente no encontrado
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm">Mostrar</a>
                            <a href="#" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
        <ul class="pagination">
            {{-- Anterior --}}
            @if ($contratos->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">« Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $contratos->previousPageUrl() }}" class="page-link">« Previous</a>
                </li>
            @endif

            {{-- Números de página --}}
            @php
                $start = max($contratos->currentPage() - 5, 1);
                $end = min($start + 9, $contratos->lastPage());

                if ($end - $start < 9) {
                    $start = max($end - 9, 1);
                }
            @endphp

            @for ($i = $start; $i <= $end; $i++)
                <li class="page-item {{ $i == $contratos->currentPage() ? 'active' : '' }}">
                    <a href="{{ $contratos->url($i) }}" class="page-link">{{ $i }}</a>
                </li>
            @endfor

            {{-- Siguiente --}}
            @if ($contratos->hasMorePages())
                <li class="page-item">
                    <a href="{{ $contratos->nextPageUrl() }}" class="page-link">Next »</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Next »</span>
                </li>
            @endif
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/paginacion.js') }}"></script>



</body>
</html>
