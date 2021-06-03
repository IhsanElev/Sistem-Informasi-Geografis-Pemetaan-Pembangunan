@extends('layouts.app')

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-md-10">
                    @can('create', new App\Pembangunan)
                    <a href="{{ route('pembangunan.create') }}" class="btn btn-primary">
                        Buat Data
                    </a>
                    <button type="button" class="btn btn-success" id="__btnExportExcel">
                        Export Excel
                        </a>
                        @endcan
                </div>
                <div class="col-md-2">
                    <select id="__filterTahun" class="form-control">
                        <option value="" disabled>- Pilih Tahun -</option>
                        @for ($tahun = date('Y'); $tahun >= date('Y') - 5; $tahun--)
                        <option value="{{ $tahun }}">
                            {{ $tahun }}
                        </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="__tablePembangunan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pekerjaan</th>
                            <th>Alamat Pekerjaan</th>
                            <th>Nilai Kontrak</th>
                            <th>Tahun</th>
                            <th>Panjang Pekerjaan</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/pembangunan/index.js?_=' . rand()) }}"></script>
@endpush