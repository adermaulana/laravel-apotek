@extends('admin.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
        <div class="col-lg-12">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Penjualan</h1>
            </div>

            <div class="table-responsive col-lg-12">
                <table id="myTable" class="table table-striped table-sm mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->nama_order }}</td>
                                <td>{{ $order->email_order }}</td>
                                <td>{{ $order->alamat_order }}</td>
                                <td>{{ $order->telepon_order }}</td>
                                <td>Rp. {{ number_format($order->total_order, 0, ',', '.') }}</td>
                                <td>
                                    <button type="button" class="btn btn-{{ getStatusColor($order->status_order) }}"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $order->id_order }}">
                                        {{ $order->status_order }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $order->id_order }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi
                                                        Pembayaran</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($order->payment)
                                                        <p>Total Bayar: {{ $order->payment->total_pembayaran }}</p>
                                                        @if ($order->payment->foto_pembayaran)
                                                            <img src="{{ asset($order->payment->foto_pembayaran) }}"
                                                                alt="Bukti Pembayaran" style="max-width: 100%;">
                                                        @endif
                                                    @else
                                                        <p>Tidak ada bukti pembayaran.</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary konfirmasi-btn"
                                                        data-order-id="{{ $order->id_order }}">
                                                        Konfirmasi
                                                    </button>
                                                    <button type="button" class="btn btn-danger tolak-btn"
                                                        data-order-id="{{ $order->id_order }}">
                                                        Tolak
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('penjualan.show', $order->id_order) }}"
                                        class="badge bg-success border-0">
                                        <span data-feather="eye"></span>
                                    </a>
                                    <form action="{{ route('penjualan.destroy', $order->id_order) }}" method="POST"
                                        class="d-inline">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

            $('.konfirmasi-btn').click(function() {
                var orderId = $(this).data('order-id');
                $.ajax({
                    url: "{{ route('penjualan.konfirmasi') }}",
                    type: 'POST',
                    data: {
                        id_order: orderId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Pembayaran berhasil dikonfirmasi!');
                            window.location.reload();
                        } else {
                            alert('Terjadi kesalahan saat melakukan konfirmasi pembayaran.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat melakukan konfirmasi pembayaran.');
                    }
                });
            });

            $('.tolak-btn').click(function() {
                var orderId = $(this).data('order-id');
                $.ajax({
                    url: "{{ route('penjualan.tolak') }}",
                    type: 'POST',
                    data: {
                        id_order: orderId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Pembayaran telah ditolak!');
                            window.location.reload();
                        } else {
                            alert('Terjadi kesalahan saat menolak pembayaran.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menolak pembayaran.');
                    }
                });
            });
        });
    </script>
@endsection
