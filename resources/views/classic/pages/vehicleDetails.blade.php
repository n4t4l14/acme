@extends('classic.layouts.generalLayout')

@section('page_content')
    <h3 class="text-muted">Vehículo <strong>{{strtoupper($vehicle->plate)}}</strong> <i class="bi bi-truck text-primary"></i></h3>
    <hr>
    <div class="accordion mb-3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Información del vehículo
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p><strong>Placa: </strong>{{$vehicle->plate}}</p>
                    <p><strong>Color: </strong>{{$vehicle->color}}</p>
                    <p><strong>Marca: </strong>{{$vehicle->brand}}</p>
                    <p><strong>Tipo: </strong>{{$vehicle->type}}</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Información del conductor
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p><strong>Número Identificación: </strong>{{$vehicle->driver->identification_number}}</p>
                    <p>
                        <strong>Nombres: </strong>{{$vehicle->driver->first_name}} {{$vehicle->driver->second_name}}
                    </p>
                    <p><strong>Apellidos: </strong>{{$vehicle->driver->surnames}}</p>
                    <p><strong>Dirección: </strong>{{$vehicle->driver->address}}</p>
                    <p><strong>Teléfono: </strong>{{$vehicle->driver->phone_number}}</p>
                    <p><strong>Ciudad: </strong>{{$vehicle->driver->city}}</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Información del propietario
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p><strong>Número Identificación: </strong>{{$vehicle->owner->identification_number}}</p>
                    <p>
                        <strong>Nombres: </strong>{{$vehicle->owner->first_name}} {{$vehicle->owner->second_name}}
                    </p>
                    <p><strong>Apellidos: </strong>{{$vehicle->owner->surnames}}</p>
                    <p><strong>Dirección: </strong>{{$vehicle->owner->address}}</p>
                    <p><strong>Teléfono: </strong>{{$vehicle->owner->phone_number}}</p>
                    <p><strong>Ciudad: </strong>{{$vehicle->owner->city}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
        });
    </script>
@endpush
