@extends('classic.layouts.generalLayout')

@section('page_content')
    <h3 class="text-muted">Crear Vehículo <i class="bi bi-truck text-primary"></i></h3>
    <hr>
    <form action="{{route('api.v1.vehicle.post')}}" id="vehicleFormCreate" method="POST">
        <div class="row justify-content-evenly">
            <div class="col-10">
                <div class="alert alert-primary alert-dismissible" role="alert" style="display: none" id="responseAlert">
                    <strong><i class="bi"></i></strong>
                    <span id="response"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label for="plate" class="form-label">
                        <small class="text-danger">*</small> Placa
                    </label>
                    <input type="text" class="form-control" id="plate" required>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">
                        <small class="text-danger">*</small> Color
                    </label>
                    <input type="text" class="form-control" id="color" required>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">
                        <small class="text-danger">*</small> Marca
                    </label>
                    <input type="text" class="form-control" id="brand" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">
                        <small class="text-danger">*</small> Conductor
                    </label>
                    <select class="form-select" id="type" required>
                        <option value="Particular">Particular</option>
                        <option value="Publico">Público</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="driver_id" class="form-label">
                        <small class="text-danger">*</small> Conductor
                    </label>
                    <select class="form-select" id="driver_id" required>
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->full_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="owner_id" class="form-label">
                        <small class="text-danger">*</small> Propietario
                    </label>
                    <select class="form-select" id="owner_id" required>
                        @foreach($owners as $owner)
                            <option value="{{$owner->id}}">{{$owner->full_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-11 mb-2" style="text-align: right">
                <button type="submit" class="btn btn-primary" id="createPerson">Crear</button>
            </div>
        </div>
    </form>
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $('#vehicleFormCreate').submit(function (e) {
                e.preventDefault();

                let responseAlert = $('#responseAlert');
                let url = $(this).prop('action');
                let data = {
                    "data": {
                        "type": "vehicle",
                        "attributes": {
                            "plate": $('#plate').val(),
                            "color": $('#color').val(),
                            "brand": $('#brand').val(),
                            "type": $('#type').val(),
                            "driver_id": $('#driver_id').val(),
                            "owner_id": $('#owner_id').val(),
                        }
                    }

                };

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function () {
                        $(responseAlert).removeClass('alert-warning');
                        $(responseAlert).addClass('alert-primary');

                        $('i', responseAlert).removeClass('i-exclamation-lg');
                        $('i', responseAlert).addClass('bi-check-circle-fill');

                        $("#vehicleFormCreate")[0].reset();
                        $('#response').html('Vehículo creado con éxito');
                    },
                    error: function () {
                        $(responseAlert).removeClass('alert-primary');
                        $(responseAlert).addClass('alert-warning');

                        $('i', responseAlert).removeClass('bi-check-circle-fill');
                        $('i', responseAlert).addClass('i-exclamation-lg');

                        $('#response').html('Error al intentar crear el vehículo!');
                    },
                    complete: function () {
                        $(responseAlert).show();
                    }
                });
            });
        });
    </script>
@endpush
