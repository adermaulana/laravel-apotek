@extends('admin.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-lg-12">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Pemasok</h1>
            </div>

            <div class="table-responsive col-lg-11">
                <a class="btn btn-success mb-3" href="{{ route('pemasok.create') }}">Tambah Pemasok Baru</a>
                <table id="myTable" class="table table-striped table-lg mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pemasok</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pemasok as $pemasok)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemasok->nama_pemasok }}</td>
                                <td>{{ $pemasok->alamat_pemasok }}</td>
                                <td>{{ $pemasok->telepon_pemasok }}</td>
                                <td>{{ $pemasok->admin->nama_admin }}</td>
                                <td>
                                    <a href="{{ route('pemasok.edit', $pemasok->id_pemasok) }}" 
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pemasok.destroy', $pemasok->id_pemasok) }}" 
                                        method="POST" class="d-inline">
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