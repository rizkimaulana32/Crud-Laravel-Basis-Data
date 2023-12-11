@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('rute') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('rute') }}' class="btn btn-secondary">Kembali</a>
            <div class="mb-3 row">
                <label for="ID_Rute" class="col-sm-2 col-form-label">ID_Rute</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Rute' value="{{ Session::get('ID_Rute') }}"
                        id="ID_Rute">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_Rute" class="col-sm-2 col-form-label">Nama_Rute</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama_Rute' value="{{ Session::get('Nama_Rute') }}"
                        id="Nama_Rute">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Waktu_Tiba" class="col-sm-2 col-form-label">Waktu_Tiba</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Waktu_Tiba' value="{{ Session::get('Waktu_Tiba') }}"
                        id="Waktu_Tiba">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Waktu_Berangkat" class="col-sm-2 col-form-label">Waktu_Berangkat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Waktu_Berangkat'
                        value="{{ Session::get('Waktu_Berangkat') }}" id="Waktu_Berangkat">
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
                <label for="IDLokasi_berangkat_ke" class="col-sm-2 col-form-label">IDLokasi_berangkat_ke</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='IDLokasi_berangkat_ke'
                        value="{{ Session::get('IDLokasi_berangkat_ke') }}" id="IDLokasi_berangkat_ke">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="IDLokasi_berangkat_dari" class="col-sm-2 col-form-label">IDLokasi_berangkat_dari</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='IDLokasi_berangkat_dari'
                        value="{{ Session::get('IDLokasi_berangkat_dari') }}" id="IDLokasi_berangkat_dari">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="IDLokasi_berangkat_dari" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
