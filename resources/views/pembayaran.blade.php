@extends('layouts.main')

@section('container')
<div class="col">
    <div>
        <h4 class="mb-3">Pembayaranku</h4>
        
        @foreach($orders as $order)
        <div id="container-booking-list">
            <div id="no-data-row" class="card mb-3 nodata">
                <div class="no-gutters">
                    <div class="">
                        <div class="card-header">
                            <div class="row">
                                <div class="col text-left text-muted">
                                    ID Order : <strong>{{ $order->id_order }}</strong>
                                </div>
                                <div style="text-align:right;" class="col text">
                                    <strong class="bayar">Rp {{ number_format($order->total_order, 0, ',', '.') }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $order->nama_order }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col text-end action-right">
                                @switch($order->status_order)
                                    @case('Proses')
                                        <span class="badge bg-info">{{ $order->status_order }}</span>
                                        @break
                                    @case('Sudah Bayar')
                                        <span class="badge bg-success">{{ $order->status_order }}</span>
                                        @break
                                    @case('Ditolak')
                                        <span class="badge bg-danger">{{ $order->status_order }}</span>
                                        @break
                                    @default
                                        <a href="{{ route('pembayaran.konfirmasi', $order->id_order) }}" 
                                           class="btn-link disabled">Konfirmasi Pembayaran</a>
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection