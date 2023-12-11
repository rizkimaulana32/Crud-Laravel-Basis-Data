@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('tiket') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('tiket') }}' class="btn btn-secondary">Kembali</a>
            <div class="mb-3 row">
                <label for="ID_Tiket" class="col-sm-2 col-form-label">ID_Tiket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Tiket' value="{{ Session::get('ID_Tiket') }}"
                        id="ID_Tiket">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Harga' value="{{ Session::get('Harga') }}"
                        id="Harga">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Jadwal_Berangkat" class="col-sm-2 col-form-label">Jadwal_Berangkat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Jadwal_Berangkat'
                        value="{{ Session::get('Jadwal_Berangkat') }}" id="Jadwal_Berangkat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Tgl_Beli" class="col-sm-2 col-form-label">Tgl_Beli</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Tgl_Beli' value="{{ Session::get('Tgl_Beli') }}"
                        id="Tgl_Beli">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_Transport" class="col-sm-2 col-form-label">ID_Transport</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Transport'
                        value="{{ Session::get('ID_Transport') }}" id="ID_Transport">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_Trip" class="col-sm-2 col-form-label">ID_Trip</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='ID_Trip' value="{{ Session::get('ID_Trip') }}"
                        id="ID_Trip">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_User" class="col-sm-2 col-form-label">ID_User</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='ID_User' value="{{ Session::get('ID_User') }}"
                        id="ID_User">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_User" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
