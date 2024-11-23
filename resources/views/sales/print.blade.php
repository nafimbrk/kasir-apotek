@extends('layouts.app')

@section('content')
    

<style>
        @media print {
            .no-print {
                display: none;
            }
        }

        .table th, .table td {
            padding: 8px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mt-4 mb-4">
            <h2>Nota Penjualan</h2>
            <p>{{ date('d M Y', strtotime($sale->created_at)) }}</p>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <p><strong>Tanggal:</strong> {{ date('d M Y', strtotime($sale->created_at)) }}</p>
            </div>
            <div class="col-md-6 text-end">
                <p><strong>Total Harga:</strong> {{ number_format($sale->total_price, 2) }}</p>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale->details as $detail)
                <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ number_format($detail->price, 2) }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->price * $detail->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total</th>
                    <th>{{ number_format($sale->total_price, 2) }}</th>
                </tr>
            </tfoot>
        </table>
        
        <div class="text-center no-print mt-4">
            <button onclick="window.print()" class="btn btn-primary me-2">Cetak</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}">
    
    </script>
</body>
</html>

@endsection