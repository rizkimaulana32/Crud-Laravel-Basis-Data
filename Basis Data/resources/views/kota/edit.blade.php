@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('kota/' . $data->ID_Kota) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('kota') }}' class="btn btn-secondary"> Kembali</a>
            <div class="mb-3 row">
                <label for="ID_Kota" class="col-sm-2 col-form-label">ID_Kota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Kota' value="{{ $data->ID_Kota }}" id="ID_Kota">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_Kota" class="col-sm-2 col-form-label">Nama_Kota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama_Kota' value="{{ $data->Nama_Kota }}"
                        id="Nama_Kota">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_Kota" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
