@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('trip') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('trip') }}' class="btn btn-secondary">Kembali</a>
            <div class="mb-3 row">
                <label for="ID_Trip" class="col-sm-2 col-form-label">ID_Trip</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='ID_Trip' value="{{ Session::get('ID_Trip') }}"
                        id="ID_Trip">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_Trip" class="col-sm-2 col-form-label">Nama_Trip</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama_Trip' value="{{ Session::get('Nama_Trip') }}"
                        id="Nama_Trip">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Jenis_Trip" class="col-sm-2 col-form-label">Jenis_Trip</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Jenis_Trip' value="{{ Session::get('Jenis_Trip') }}"
                        id="Jenis_Trip">
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
