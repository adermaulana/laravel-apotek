@extends('admin.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Pembelian</h1>
        </div>

        <div class="table-responsive col-lg-12">
            <a href="{{ route('pembelian.create') }}" style="background-color : #3a5a40; color:white;" class="btn btn mb-3">Tambah Pembelian</a>

            <table id="myTable" class="table table-striped table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Nama Pemasok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Beli</th>
                        <th scope="col">Harga Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelian as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->obat->nama_obat }}</td>
                        <td>{{ $data->pemasok->nama_pemasok }}</td>
                        <td>{{ $data->harga_pembelian }}</td>
                        <td>{{ $data->jumlah_pembelian }}</td>
                        <td>{{ $data->tanggal_pembelian }}</td>
                        <td>Rp. {{ number_format($data->total_pembelian, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('pembelian.destroy', $data->id_pembelian) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0" 
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection