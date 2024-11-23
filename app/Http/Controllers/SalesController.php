<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SalesDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:0',
        ]);
    
        $totalPrice = 0;
        $saleDetails = [];
    
        DB::transaction(function () use ($request, &$totalPrice, &$saleDetails) {
            foreach ($request->products as $productData) {
                $product = Product::find($productData['id']);
    
                if ($productData['quantity'] > 0) {
                    $totalPrice += $product->price * $productData['quantity'];
    
                    $product->stock -= $productData['quantity'];
                    $product->save();
    
                    $saleDetails[] = [
                        'product_id' => $product->id,
                        'quantity' => $productData['quantity'],
                        'price' => $product->price,
                    ];
                }
            }
    
            if ($totalPrice > 0) {
                $sale = Sale::create([
                    'total_price' => $totalPrice,
                ]);
    
                foreach ($saleDetails as $detail) {
                    SalesDetail::create([
                        'sale_id' => $sale->id,
                        'product_id' => $detail['product_id'],
                        'quantity' => $detail['quantity'],
                        'price' => $detail['price'],
                    ]);
                }
            }
        });
    
        return redirect()->route('sales.index')
            ->with('success', 'Transaksi berhasil disimpan.');
    }
    


    public function show($id)
    {
        $sale = Sale::with('details.product')->findOrFail($id);

        return view('sales.show', [
            'sale' => $sale,
            'details' => $sale->details,
        ]);
    }


    public function print($id)
    {
        $sale = Sale::with('details.product')->findOrFail($id);

        return view('sales.print', compact('sale'));
    }
}
