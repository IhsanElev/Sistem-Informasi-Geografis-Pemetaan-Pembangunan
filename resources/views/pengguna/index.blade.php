@extends('layouts.tampilan')
@section('styles')


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin="" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

<link rel="https://cdn.datatables.net/rowgroup/1.1.1/css/rowGroup.bootstrap4.min.css" />
<style>
    #mapid {
        min-height: 500px;
    }
</style>
@endsection
@section('content')

<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4>Total Data</h4>
            </div>
            <div class="card-body" id="total_records">
                {{$pengguna}}
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class=" col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Pekerjaan</h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>Nama Pekerjaan</th>
                            <th>Nilai Kontrak</th>
                            <th>Lokasi</th>
                            <th>Panjang Pekerjaan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>
<div class=" col-md-12 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>MAP</h4>
        </div>
        <div class="card-body" id="mapid">
        </div>
    </div>
</div>

@endsection


@push('scripts')


<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<!-- App scripts -->


<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var baseUrl = "{{ url('/') }}";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    axios.get('{{ route('api.pembangunan.index') }}')
    .then(function (response) { 
        console.log(response.data);
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
        }).addTo(map);
    })
    .catch(function (error) {
        console.log(error);
    });
</script>
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{!! route('datatables.data') !!}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'nilai_kontrak', name: 'nilai_kontrak' },
                { data: 'address', name: 'address' },
                { data: 'panjang_pekerjaan', name: 'panjang_pekerjaan' },
               
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush