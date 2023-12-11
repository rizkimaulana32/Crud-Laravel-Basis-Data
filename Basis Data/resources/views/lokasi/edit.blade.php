@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('lokasi/' . $data->ID_Lokasi) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('lokasi') }}' class="btn btn-secondary"> Kembali</a>
            <div class="mb-3 row">
                <label for="ID_Lokasi" class="col-sm-2 col-form-label">ID_Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Lokasi' value="{{ $data->ID_Lokasi }}"
                        id="ID_Lokasi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Jenis_Lokasi" class="col-sm-2 col-form-label">Jenis_Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Jenis_Lokasi' value="{{ $data->Jenis_Lokasi }}"
                        id="Jenis_Lokasi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_Lokasi" class="col-sm-2 col-form-label">Nama_Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama_Lokasi' value="{{ $data->Nama_Lokasi }}"
                        id="Nama_Lokasi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_Kota" class="col-sm-2 col-form-label">ID_Kota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Kota' value="{{ $data->ID_Kota }}" id="ID_Kota">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_Kota" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
