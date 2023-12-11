@extends('layout.tamplate')
<!-- START DATA -->
@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('tiket') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>


        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('tiket/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">ID_Tiket</th>
                    <th class="col-md-1">Harga</th>
                    <th class="col-md-1">Jadwal_Berangkat</th>
                    <th class="col-md-1">Tgl_Beli</th>
                    <th class="col-md-1">ID_Transport</th>
                    <th class="col-md-1">ID_Trip</th>
                    <th class="col-md-1">ID_User</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->ID_Tiket }}</td>
                        <td>{{ $item->Harga }}</td>
                        <td>{{ $item->Jadwal_Berangkat }}</td>
                        <td>{{ $item->Tgl_Beli }}</td>
                        <td>{{ $item->ID_Transport }}</td>
                        <td>{{ $item->ID_Trip }}</td>
                        <td>{{ $item->ID_User }}</td>
                        <td>
                            <a href='{{ url('tiket/' . $item->ID_Tiket . '/edit') }}'
                                class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda yakin untuk menghapus data?')" class='d-inline'
                                action="{{ url('tiket/' . $item->ID_Tiket) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links('vendor.pagination.bootstrap-5') }}

    </div>
@endsection
<!-- AKHIR DATA -->
