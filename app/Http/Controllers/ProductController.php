<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboard()
    {
        $products = Product::latest()->get();

        $totalProfit = $products->sum(fn($p) => $p->profit);
        $invested = $products->where('status', 'available')->sum('purchase_price');
        $available = $products->where('status', 'available')->count();
        $sold = $products->where('status', 'sold')->count();

        return view('dashboard', compact(
            'products',
            'totalProfit',
            'invested',
            'available',
            'sold'
        ));
    }

    public function index(Request $request)
    {
        $query = Product::latest();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%')
                  ->orWhere('tags', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'purchase_price' => $request->purchase_price,
            'expected_sale_price' => $request->expected_sale_price,
            'transport_cost' => $request->transport_cost ?? 0,
            'purchase_date' => $request->purchase_date,
            'purchase_payment' => $request->purchase_payment,
            'tags' => $request->tags,
            'notes' => $request->notes,
            'has_defect' => $request->has_defect ? true : false,
            'status' => 'available',
        ]);

        return redirect()->route('products.index');
    }

    public function sell(Request $request, Product $product)
    {
        $product->update([
            'sale_price' => $request->sale_price,
            'sale_date' => $request->sale_date,
            'sale_payment' => $request->sale_payment,
            'status' => 'sold',
        ]);

        return redirect()->route('dashboard');
    }
}