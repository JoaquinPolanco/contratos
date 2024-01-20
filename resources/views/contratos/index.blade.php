<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIFT AND CONTROL</title>
    <link rel="icon" href="{{ asset('img/fb.jpg') }}" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
    <div style="display: flex; align-items: center; justify-content: center;">
        <img src="img/fb.jpg" alt="Logo" style="width: 50px; height: 50px; margin-right: 15px;">
        <h1 style="margin-left: 15px;">SHIFT AND CONTROL</h1>
    </div>
     
    <h1>Contratos</h1>
        <a href="{{ route('contratos.create') }}" class="btn btn-primary mb-3">Agregar Contrato</a>

        <table class="table table-bordered ">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Número de Contrato</th>
                    <th>Nombre del Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($contratos as $contrato)
    <tr class="text-center">
        <td>{{ $contrato->contract_number }}</td>
        <td>
            @if($contrato->client)
                {{ $contrato->client->name }}
            @else
                Cliente no encontrado
            @endif
        </td>
        <td>
            <a href="#" class="btn btn-primary btn-sm mostrar-contrato"
            data-numero-contrato="{{ $contrato->contract_number }}"
            data-nombre-cliente="{{ $contrato->client ? $contrato->client->name : 'Cliente no encontrado' }}"
            data-created-at="{{ $contrato->created_at->format('Y-m-d H:i:s') }}"
            data-servicios="{{ json_encode($contrato->services) }}"
            data-toggle="modal"
            data-target="#mostrarContratoModal">Mostrar</a>

            <a href="#" class="btn btn-primary btn-sm editar-contrato"
            data-id="{{ $contrato->id }}"
            data-contract-number="{{ $contrato->contract_number }}"
            data-user-id="{{ $contrato->user_id }}"
            data-revised="{{ $contrato->revised }}"
            data-location="{{ $contrato->location }}"
            data-toggle="modal"
            data-target="#editarContratoModal">Editar</a>
            

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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <script>
        $(document).ready(function() {
        $('.editar-contrato').on('click', function() {
            var contratoId = $(this).data('id');
            var contractNumber = $(this).data('contract-number');
            var userId = $(this).data('user-id');
            var revised = $(this).data('revised');
            var location = $(this).data('location');
            $('#editarContratoForm').attr('action', '/contratos/' + contratoId);
            $('#contract_number').val(contractNumber);
            $('#user_id').val(userId);
            $('#revised').val(revised); 
            $('#location').val(location);
            $('#editarContratoModal').modal('show');
        });
    });
    </script>

<script>
    $(document).ready(function() {
        $('.mostrar-contrato').on('click', function() {
            var numeroContrato = $(this).data('numero-contrato');
            var nombreCliente = $(this).data('nombre-cliente');
            var createdAt = $(this).data('created-at');
            var servicios = $(this).data('servicios');
            var formattedDate = moment(createdAt).format('DD/MM/YYYY');

            $('#modal-numero-contrato').text(numeroContrato);
            $('#modal-nombre-cliente').text(nombreCliente);
            $('#modal-created-at').text(formattedDate); 
            $('#modal-servicios').empty();
            for (var i = 0; i < servicios.length; i++) {
                $('#modal-servicios').append('<p>' + servicios[i].name + '</p>');
            }
('#mostrarContratoModal').modal('show');
        });
    });
</script>
            $

    <!-- Modal para mostrar  -->

<div class="modal fade" id="mostrarContratoModal" tabindex="-1" role="dialog" aria-labelledby="mostrarContratoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mostrarContratoModalLabel">Detalles del Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong> <span id="modal-numero-contrato"></span></strong></p>
                <p><strong>Creación:</strong> <span id="modal-created-at"></span></p> 
                <p><strong>Cliente:</strong> <span id="modal-nombre-cliente"></span></p>
                <p><strong>Servicios:</strong> <div id="modal-servicios"></div></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
    </div>
</div>


    <!-- Modal para editar  -->
<div class="modal fade" id="editarContratoModal" tabindex="-1" role="dialog" aria-labelledby="editarContratoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarContratoModalLabel">Editar Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        <form id="editarContratoForm" action="{{ route('contratos.update', ['contrato' => $contrato->id]) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="contract_number">Número de Contrato:</label>
        <input type="text" class="form-control" name="contract_number" id="contract_number" value="{{ $contrato->contract_number }}" required>
    </div>
    <div class="form-group">
        <label for="user_id">ID de Cliente:</label>
        <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $contrato->user_id}}" required>
    </div>
    <div class="form-group">
        <label for="revised">Revisado:</label>
        <select name="revised" id="revised" class="form-control" required>
            <option value="1" {{ $contrato->revised == 1 ? 'selected' : '' }}>Revisado</option>
            <option value="0" {{ $contrato->revised == 0 ? 'selected' : '' }}>No Revisado</option>
        </select>
    </div>

    <div class="form-group">
        <label for="principal">Principal:</label>
        <select name="principal" class="form-control" required>
            <option value="1" {{ $contrato->principal == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ $contrato->principal == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="location">Ubicación:</label>
        <select name="location" class="form-control" required>
            <option value="1" {{ $contrato->location == 1 ? 'selected' : '' }}> 1</option>
            <option value="2" {{ $contrato->location == 2 ? 'selected' : '' }}> 2</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
</form> 
</div>

</body>
</html>
