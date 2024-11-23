@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 mb-4">Detail Penjualan</h2>

            <table class="table table-bordered border-dark">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ number_format($detail->price, 2) }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ number_format($detail->price * $detail->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total</strong></td>
                        <td><strong>{{ number_format($sale->total_price, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
<div class="mt-4">

    <a href="{{ route('sales.print', $sale->id) }}" class="btn btn-primary me-2">Cetak Nota</a>
    
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali</a>
</div>
        </div>
    </div>
</div>
@endsection

