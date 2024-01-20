<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Contrato</title>
    <link rel="icon" href="{{ asset('img/fb.jpg') }}" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Crear Contrato</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contratos.store') }}" method="post">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="contract_number">Número de Contrato:</label>
                                    <input type="text" class="form-control" name="contract_number" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="user_id">ID de Cliente:</label>
                                    <input type="text" class="form-control" name="user_id" required>
                                </div>

                                <div class="form-group">
                                <label for="revised">Revisado:</label>
                                <select name="revised" id="revised" class="form-control" required>
                                    <option value="1" >Revisado</option>
                                    <option value="0" >No Revisado</option>
                                </select>
                            </div>

                                <div class="form-group col-md-4">
                                    <label for="location">Ubicación:</label>
                                    <select name="location" class="form-control" required>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->location}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="principal">Principal:</label>
                                    <select name="principal" class="form-control" required>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="service_id">Servicio:</label>
                                    <select name="service_id" class="form-control" required>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Contrato</button>
                            <a href="/" class="btn btn-primary">Regresar a contratos</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
