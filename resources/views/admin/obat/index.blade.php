@extends('admin.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-lg-12">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Obat</h1>
            </div>

            <div class="table-responsive col-lg-11">
                <a class="btn btn-success mb-3" href="{{ route('obat.create') }}">Tambah Obat Baru</a>
                  <table id="myTable" class="table table-striped table-lg mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_obat as $obat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $obat->nama_obat }}</td>
                                <td>{{ $obat->deskripsi_obat }}</td>
                                <td>Rp {{ number_format($obat->harga_obat, 0, ',', '.') }}</td>
                                <td>{{ $obat->stok_obat }}</td>
                                <td>
                                    @if ($obat->gambar_obat)
                                        <a target="_blank" href="/{{  $obat->gambar_obat }}"><img src="/{{  $obat->gambar_obat }}" width="100" alt="Gambar Obat"></a>
                                    @else
                                        <span>Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('obat.edit', $obat->id_obat) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('obat.destroy', $obat->id_obat) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</button>
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
