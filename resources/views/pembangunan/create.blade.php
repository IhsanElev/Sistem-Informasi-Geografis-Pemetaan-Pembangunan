@extends('layouts.app')

@section('title', 'Tambah Program')


@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Tambah Program</div>
            <form enctype="multipart/form-data" method="POST" action="{{ route('pembangunan.store') }}"
                accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">Nama Pekerjaan</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="nilai_kontrak" class="control-label">Nilai Kontrak</label>
                        <input id="nilai_kontrak"
                            class="form-control{{ $errors->has('nilai_kontrak') ? ' is-invalid' : '' }}"
                            name="nilai_kontrak" required>
                        {!! $errors->first('nilai_kontrak', '<span class="invalid-feedback"
                            role="alert">:message</span>') !!}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="control-label">latitude</label>
                                <input id="latitude" type="text"
                                    class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"
                                    name="latitude" value="{{ old('latitude', request('latitude')) }}" required>
                                {!! $errors->first('latitude', '<span class="invalid-feedback"
                                    role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="control-label">Longtitude
                                </label>
                                <input id="longitude" type="text"
                                    class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}"
                                    name="longitude" value="{{ old('longitude', request('longitude')) }}" required>
                                {!! $errors->first('longitude', '<span class="invalid-feedback"
                                    role="alert">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="kecamatan" class="form-control">
                            <option value="">- Pilih Kecamatan -</option>
                            @foreach ($kecamatan as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="desa_id" id="desa" class="form-control">
                            <option value="">- Pilih Desa -</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Lokasi</label>
                        <input id="address" type="text"
                            class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                            required>
                        {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>')
                        !!}
                    </div>
                    <div class="form-group">
                        <label for="panjang_pekerjaan" class="control-label">Panjang Pekerjaan</label>
                        <input id="panjang_pekerjaan"
                            class="form-control{{ $errors->has('panjang_pekerjaan') ? ' is-invalid' : '' }}"
                            name="panjang_pekerjaan" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai_pagu" class="control-label">Nilai Pagu</label>
                        <input id="nilai_pagu" class="form-control{{ $errors->has('nilai_pagu') ? ' is-invalid' : '' }}"
                            name="nilai_pagu" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun" class="control-label">Tahun</label>
                        <input id="tahun" class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}"
                            name="tahun" required>
                    </div>
                    <div class="form-group">
                        <label for="volume" class="control-label">volume</label>
                        <input id="volume" class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}"
                            name="volume" required>
                    </div>
                    <label for="gambar">gambar</label>
                    <br>
                    <input id="gambar" name="gambar" type="file"
                        class="form-control {{$errors->first('gambar') ? "is-invalid" : ""}}">
                    <div class="invalid-feedback">
                        {{$errors->first('gambar')}}
                    </div>

                    {{-- <div id="mapid"></div> --}}
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('pembangunan.create') }}" class="btn btn-success">
                    <a href="{{ route('pembangunan.index') }}" class="btn btn-link">cencel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="{{ asset('js/pembangunan/create.js?_=' . rand()) }}"></script>
@endpush