@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('transportasi_publik/' . $data->ID_Transport) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('transportasi_publik') }}' class="btn btn-secondary"> Kembali</a>
            <div class="mb-3 row">
                <label for="ID_Transport" class="col-sm-2 col-form-label">ID_Transport</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Transport' value="{{ $data->ID_Transport }}"
                        id="ID_Transport">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_Transport" class="col-sm-2 col-form-label">Nama_Transport</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama_Transport' value="{{ $data->Nama_Transport }}"
                        id="Nama_Transport">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Transport_Company" class="col-sm-2 col-form-label">Transport_Company</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Transport_Company'
                        value="{{ $data->Transport_Company }}" id="Transport_Company">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Transport_Company" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
