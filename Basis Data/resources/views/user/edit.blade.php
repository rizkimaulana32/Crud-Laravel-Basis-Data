@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('user/' . $data->ID_User) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('user') }}' class="btn btn-secondary"> Kembali</a>
            <div class="mb-3 row">
                <label for="ID_User" class="col-sm-2 col-form-label">ID_User</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='ID_User' value="{{ $data->ID_User }}" id="ID_User">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_User" class="col-sm-2 col-form-label">Nama_User</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama_User' value="{{ $data->Nama_User }}"
                        id="Nama_User">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Sex" class="col-sm-2 col-form-label">Sex</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Sex' value="{{ $data->Sex }}" id="Sex">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Email' value="{{ $data->Email }}" id="Email">
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
