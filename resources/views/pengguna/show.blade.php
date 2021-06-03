@extends('layouts.tampilan')

@section('title', 'Detail pengguna')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Detail Pekerjaan</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>Nama Pekerjaan</td>
                            <td>{{ $pengguna->name }}</td>
                        </tr>
                        <tr>
                            <td>Nilai Kontrak</td>
                            <td>@currency($pengguna->nilai_kontrak)</td>
                        </tr>
                        <tr>
                            <td>Nilai Kontrak</td>
                            <td>@currency($pengguna->nilai_pagu)</td>
                        </tr>
                        <tr>
                            <td>Koordinat</td>
                            <td>{{ $pengguna->latitude }} , {{$pengguna->longitude}}</td>
                        </tr>

                        <tr>
                            <td>Lokasi</td>
                            <td>{{ $pengguna->address}}</td>
                        </tr>
                        <tr>
                            <td>Panjang pekerjaan</td>
                            <td>{{ $pengguna->panjang_pekerjaan}} M</td>
                        </tr>
                        <tr>
                            <td>Volume</td>
                            <td>{{ $pengguna->volume}} M<sup>3</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>{{ $pengguna->tahun}}</td>
                        </tr>
                        <tr>
                            <td>Gambar</td>
                            <td> @if($pengguna->gambar)
                                <img src="{{asset('storage/' . $pengguna->gambar)}}" width="400px" height="200px" />
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Koordinat Pekerjaan</div>
            @if ($pengguna->coordinate)
            <div class="card-body" id="mapid"></div>
            @else
            <div class="card-body">Kordinat</div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin="" />

<style>
    #mapid {
        height: 400px;
    }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $pengguna->latitude }}, {{ $pengguna->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $pengguna->latitude }}, {{ $pengguna->longitude }}]).addTo(map)
        .bindPopup('{!! $pengguna->map_popup_content !!}');
</script>
@endpush