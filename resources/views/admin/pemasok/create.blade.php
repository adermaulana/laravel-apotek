@extends('admin.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-lg-12">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Pemasok</h1>
            </div>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Pemasok Baru</h1>
            </div>

            <div class="col-lg-8">
                {{-- Form Tambah Pemasok --}}
                <form method="POST" action="{{ route('pemasok.store') }}" enctype="multipart/form-data" class="mb-5">
                    @csrf {{-- Token CSRF untuk keamanan --}}
                    
                    {{-- Input ID Admin (Hidden) --}}
                    <input type="hidden" name="id_admin" value="{{ auth()->user()->id_admin }}">

                    {{-- Input Nama Admin (Readonly) --}}
                    <div class="mb-3">
                        <label for="admin" class="form-label">Admin</label>
                        <input type="text" class="form-control" style="background-color:#edede9;" 
                            value="{{ auth()->user()->nama_admin }}" readonly>
                    </div>

                    {{-- Input Nama Pemasok --}}
                    <div class="mb-3">
                        <label for="nama_pemasok" class="form-label">Nama Pemasok</label>
                        <input type="text" class="form-control @error('nama_pemasok') is-invalid @enderror" 
                            id="nama_pemasok" name="nama_pemasok" value="{{ old('nama_pemasok') }}" 
                            required autofocus>
                        @error('nama_pemasok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Alamat --}}
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" 
                            id="alamat" name="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Telepon --}}
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="number" class="form-control @error('telepon') is-invalid @enderror" 
                            id="telepon" name="telepon" value="{{ old('telepon') }}">
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="btn" 
                        style="background-color:#3a5a40; color:white;">Tambah Data</button>
                </form>
            </div>
        </div>
    </main>
@endsection