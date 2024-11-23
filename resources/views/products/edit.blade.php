@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 mb-4">Edit Produk</h2>

            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name" class="mb-2">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="stock" class="mb-2">Stok</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>

                <div class="form-group mb-4">
                    <label for="price" class="mb-2">Harga</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <button type="submit" class="btn btn-primary me-2">Edit</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
