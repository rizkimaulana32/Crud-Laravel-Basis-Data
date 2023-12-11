@extends('layout.tamplate')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('trip_mempunyai_rute/' . $data->ID_Trip) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('trip_mempunyai_rute') }}' class="btn btn-secondary"> Kembali</a>
            <div class="mb-3 row">
                <label for="ID_Trip" class="col-sm-2 col-form-label">ID_Trip</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='ID_Trip' value="{{ $data->ID_Trip }}" id="ID_Trip">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_Rute" class="col-sm-2 col-form-label">ID_Rute</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ID_Rute' value="{{ $data->ID_Rute }}" id="ID_Rute">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ID_Rute" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
