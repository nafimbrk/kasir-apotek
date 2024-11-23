@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <h2>Daftar Penjualan</h2>
            <a href="{{ route('sales.create') }}" class="btn btn-primary">Tambah Penjualan</a>
        </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered border-dark">
                <thead class="table-dark">
                    <tr>
                        <th>Total Harga</th>
                        <th>Waktu Pembelian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->total_price }}</td>
                            <td>{{ $sale->created_at }}</td>
                            <td>
                                <a href="{{ route('sales.show', $sale) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
