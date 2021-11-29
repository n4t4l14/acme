@extends('classic.layouts.generalLayout')

@section('page_content')
    <h3 class="text-muted">Crear Conducto o Propietario <i class="bi bi-person-plus text-primary"></i></h3>
    <hr>
    <form action="{{route('api.v1.person.post')}}" id="personFormCreate" method="POST">
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
                    <label for="identification_number" class="form-label">
                        <small class="text-danger">*</small> Número de identificación
                    </label>
                    <input type="text" class="form-control" id="identification_number" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">
                        <small class="text-danger">*</small> Primer nombre
                    </label>
                    <input type="text" class="form-control" id="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="second_name" class="form-label">
                        <small class="text-danger">*</small> Segundo nombre
                    </label>
                    <input type="text" class="form-control" id="second_name" required>
                </div>
                <div class="mb-3">
                    <label for="surnames" class="form-label">
                        <small class="text-danger">*</small> Apellidos
                    </label>
                    <input type="text" class="form-control" id="surnames" required>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="address" class="form-label">
                        <small class="text-danger">*</small> Dirección
                    </label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">
                        <small class="text-danger">*</small> Número de teléfono
                    </label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">
                        <small class="text-danger">*</small> Ciudad
                    </label>
                    <select class="form-select" id="city" name="city" required>
                        <option value="Bogotá DC">Bogotá DC</option>
                        <option value="Bucaramanga">Bucaramanga</option>
                        <option value="Cali">Cali</option>
                        <option value="Cartagena">Cartagena</option>
                        <option value="Medellin">Medellin</option>
                        <option value="Sta. Marta">Sta. Marta</option>
                    </select>
                </div>
                <div class="mb-3 form-check form-switch">
                    <input type="radio" class="form-check-input" id="rolDriver" name="role" value="Conductor" required>
                    <label class="form-check-label" for="rolDriver">
                        Conductor <small class="text-danger">*</small>
                    </label>
                </div>
                <div class="mb-3 form-check form-switch">
                    <input type="radio" class="form-check-input" id="rolOwner" name="role" value="Propietario">
                    <label class="form-check-label" for="rolOwner">Propietario</label>
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
            $('#personFormCreate').submit(function (e) {
                e.preventDefault();

                let responseAlert = $('#responseAlert');
                let url = $(this).prop('action');
                let data = {
                    "data": {
                        "type": "person",
                        "attributes": {
                            "identification_number": $('#identification_number').val(),
                            "first_name": $('#first_name').val(),
                            "second_name": $('#second_name').val(),
                            "surnames": $('#surnames').val(),
                            "address": $('#address').val(),
                            "phone_number": $('#phone_number').val(),
                            "city": $('#city').val(),
                            "role": $('input[name="role"]').val()
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

                        $('#response').html('Registro creado con éxito!');
                        $("#personFormCreate")[0].reset();
                    },
                    error: function () {
                        $(responseAlert).removeClass('alert-primary');
                        $(responseAlert).addClass('alert-warning');

                        $('i', responseAlert).removeClass('bi-check-circle-fill');
                        $('i', responseAlert).addClass('i-exclamation-lg');

                        $('#response').html('Error al intentar crear el registro!');
                    },
                    complete: function () {
                        $(responseAlert).show();
                    }
                });
            });
        });
    </script>
@endpush
