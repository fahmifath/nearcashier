<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     */
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('admin.product.index', compact('products', 'categories'));
    }

    /**
     * Get a specific product (for AJAX)
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:products,name',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
        ], [
            'category_id.required' => 'Kategori wajib dipilih',
            'category_id.exists' => 'Kategori tidak ditemukan',
            'name.required' => 'Nama produk wajib diisi',
            'name.unique' => 'Nama produk sudah terdaftar',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'purchase_price.required' => 'Harga beli wajib diisi',
            'purchase_price.numeric' => 'Harga beli harus berupa angka',
            'purchase_price.min' => 'Harga beli tidak boleh negatif',
            'selling_price.required' => 'Harga jual wajib diisi',
            'selling_price.numeric' => 'Harga jual harus berupa angka',
            'selling_price.min' => 'Harga jual tidak boleh negatif',
            'stock.required' => 'Stok wajib diisi',
            'stock.integer' => 'Stok harus berupa angka bulat',
            'stock.min' => 'Stok tidak boleh negatif',
            'unit.required' => 'Satuan wajib diisi',
            'unit.max' => 'Satuan maksimal 50 karakter',
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
        ], [
            'category_id.required' => 'Kategori wajib dipilih',
            'category_id.exists' => 'Kategori tidak ditemukan',
            'name.required' => 'Nama produk wajib diisi',
            'name.unique' => 'Nama produk sudah terdaftar',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'purchase_price.required' => 'Harga beli wajib diisi',
            'purchase_price.numeric' => 'Harga beli harus berupa angka',
            'purchase_price.min' => 'Harga beli tidak boleh negatif',
            'selling_price.required' => 'Harga jual wajib diisi',
            'selling_price.numeric' => 'Harga jual harus berupa angka',
            'selling_price.min' => 'Harga jual tidak boleh negatif',
            'stock.required' => 'Stok wajib diisi',
            'stock.integer' => 'Stok harus berupa angka bulat',
            'stock.min' => 'Stok tidak boleh negatif',
            'unit.required' => 'Satuan wajib diisi',
            'unit.max' => 'Satuan maksimal 50 karakter',
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Delete the specified product
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
