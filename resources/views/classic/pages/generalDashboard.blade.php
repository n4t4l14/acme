@extends('classic.layouts.generalLayout')

@section('page_content')
    <h3 class="text-muted">Informe De Vehículos Inscritos</h3>
    <hr>

    <table id="vehiclesReport" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Conductor</th>
            <th>Propietario</th>
            <th>Ver</th>
        </tr>
        </thead>
    </table>
@endsection

@push('plugins-styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush

@push('plugins-scripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            $('#vehiclesReport').DataTable( {
                "processing": true,
                "ajax": "{{route('api.v1.vehicle.report')}}",
                "columns": [
                    {
                        "data": function (data) {
                            return data.vehicle.plate
                        }
                    },
                    {
                        "data": function (data) {
                            return data.vehicle.brand
                        }
                    },
                    {
                        "data": function (data) {
                            return data.driver.complete_name
                        }
                    },
                    {
                        "data": function (data) {
                            return data.owner.complete_name
                        }
                    },
                    {
                        "data": null,
                        "render": function (data) {
                            let routeBase = "{{route('web.vehicle.details', ['vehicle_id' => '%vehicleId%'])}}";
                            route = routeBase.replace('%vehicleId%', data.vehicle.id);
                            return `<a href="${route}"><i class="bi bi-hand-index"></i></a>`
                        }
                    }
                ]
            } );
        } );
    </script>
@endpush
