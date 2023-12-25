@extends('layout.tamplate')
<!-- START DATA -->
@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        {{-- <div class="pb-3">
            <form class="d-flex" action="{{ url('query') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div> --}}


        <!-- TOMBOL TAMBAH DATA -->
        {{-- <div class="pb-3">
            <a href='{{ url('query/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div> --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th class="col-md-1">No</th> --}}
                    <th class="col-md-2">Nama_Transport</th>
                    <th class="col-md-2">Transport_Company</th>
                    <th class="col-md-2">Total_Penjualan</th>

                    {{-- <th class="col-md-2">Nama_Lokasi</th>
                    <th class="col-md-2">ID_Kota</th>
                    <th class="col-md-2">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                {{-- <?php $i = $data->firstItem(); ?> --}}
                @foreach ($data as $item)
                    <tr>
                        {{-- <td>{{ $i }}</td> --}}
                        <td>{{ $item->Nama_Transport }}</td>
                        <td>{{ $item->Transport_Company }}</td>
                        <td>{{ $item->Total_Penjualan }}</td>
                        {{-- <td>{{ $item->Nama_Lokasi }}</td>
                        <td>{{ $item->ID_Kota }}</td> --}}
                        {{-- <td>
                            <a href='{{ url('query/' . $item->ID_Lokasi . '/edit') }}'
                                class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda yakin untuk menghapus data?')" class='d-inline'
                                action="{{ url('query/' . $item->ID_Lokasi) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td> --}}
                    </tr>
                    {{-- <?php $i++; ?> --}}
                @endforeach
            </tbody>
        </table>
        {{-- {{ $data->withQueryString()->links('vendor.pagination.bootstrap-5') }} --}}

    </div>
@endsection
<!-- AKHIR DATA -->
