@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mt-4 mb-4">Tambah Penjualan</h2>

                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf

                    <table class="table table-bordered border-dark">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Jumlah Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <input type="number" name="products[{{ $product->id }}][quantity]" min="0"
                                            max="{{ $product->stock }}" value="0" class="form-control">
                                        <input type="hidden" name="products[{{ $product->id }}][id]"
                                            value="{{ $product->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">

                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
