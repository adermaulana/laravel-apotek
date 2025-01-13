@extends('admin.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-lg-12">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Pembelian</h1>
            </div>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Pembelian</h1>
            </div>

            <div class="col-lg-8">
                <form method="POST" action="{{ route('pembelian.store') }}" class="mb-5">
                    @csrf
                    <input type="hidden" name="id_admin" value="{{ $admin->id }}">

                    <div class="mb-3">
                        <label for="admin" class="form-label">Admin</label>
                        <input style="background-color:#edede9;" type="text" class="form-control"
                            value="{{ $admin->nama_admin }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="obat_id" class="form-label">Obat</label>
                        <select class="form-select js-example-basic-single @error('obat_id') is-invalid @enderror"
                            id="obat_id" name="obat_id">
                            <option value="0" disabled selected>Pilih</option>
                            @foreach ($obat as $item)
                                <option value="{{ $item->id_obat }}" data-harga="{{ $item->harga_obat }}"
                                    data-stok="{{ $item->stok_obat }}">
                                    {{ $item->nama_obat }}
                                </option>
                            @endforeach
                        </select>
                        @error('obat_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_pemasok" class="form-label">Nama Pemasok</label>
                        <select class="form-select js-example-basic-single @error('id_pemasok') is-invalid @enderror"
                            id="id_pemasok" name="id_pemasok" required>
                            <option value="0" disabled selected>Pilih</option>
                            @foreach ($pemasok as $item)
                                <option value="{{ $item->id_pemasok }}">{{ $item->nama_pemasok }}</option>
                            @endforeach
                        </select>
                        @error('id_pemasok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input style="background-color:#edede9;" type="number"
                            class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                            readonly>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input style="background-color:#edede9;" type="number" class="form-control" id="stok"
                            name="stok" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                            name="jumlah">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ date('Y-m-d') }}" readonly>
                    </div>

                    <div class="mb-4 col-2">
                        <label for="harga_total" class="form-label">Harga Total</label>
                        <input style="background-color:#edede9;" type="text"
                            class="form-control @error('harga_total') is-invalid @enderror" id="total"
                            name="harga_total" readonly>
                        @error('harga_total')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button style="background-color:#3a5a40; color:white;" type="submit" class="btn btn">Tambah
                        Data</button>
                </form>
            </div>
        </div>
    </main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            $('#obat_id').on('change', function() {
                // ... (existing code)

                // Reset the supplier selection when changing the medicine
                $('#id_pemasok').val('0');
            });

            $('#jumlah').on('change', function() {
                // ... (existing code)
            });

            $('form').submit(function(event) {
                // Check if the supplier is selected
                if ($('#id_pemasok').val() === '0') {
                    alert('Silahkan Memilih Supplier');
                    event.preventDefault(); // Prevent form submission
                }
            });
        });


        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $('#obat_id').on('change', function() {
            // ambil data dari elemen option yang dipilih
            const price = $('#obat_id option:selected').data('harga');
            const unit = $('#obat_id option:selected').data('unit');
            const stok = $('#obat_id option:selected').data('stok');
            const beli = $('#obat_id option:selected').data('beli');
            const banyak = $('#jumlah').val();

            // kalkulasi total harga
            const total = price;
            const total1 = beli;
            const total2 = unit;
            const total3 = stok;

            // tampilkan data ke element
            $('[name=stok]').val(`${total3}`);
            $('[name=unit_id]').val(`${total2}`);
            $('[name=harga_beli]').val(`${total1}`);

            $('#harga').val(`${total}`);
        });

        $('#jumlah').on('change', function() {
            const price = $('#obat_id option:selected').data('harga');
            const beli = $('#obat_id option:selected').data('beli');
            const banyak = $('#jumlah').val();

            const total4 = banyak * price;
            const total5 = banyak * beli;

            $('#total').val(`${total4}`);
            $('#total_beli').val(`${total5}`);
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"

@endsection



