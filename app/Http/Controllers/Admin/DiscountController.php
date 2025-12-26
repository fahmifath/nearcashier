<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of discounts
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index', compact('discounts'));
    }

    /**
     * Get a specific discount (for AJAX)
     */
    public function show(Discount $discount)
    {
        return response()->json($discount);
    }

    /**
     * Store a newly created discount
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:discounts,name',
            'type' => 'required|in:percent,nominal',
            'value' => 'required|numeric|min:0',
            'minimum_purchase' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'name.required' => 'Nama diskon wajib diisi',
            'name.unique' => 'Nama diskon sudah terdaftar',
            'name.max' => 'Nama diskon maksimal 255 karakter',
            'type.required' => 'Tipe diskon wajib dipilih',
            'type.in' => 'Tipe diskon harus persen atau nominal',
            'value.required' => 'Nilai diskon wajib diisi',
            'value.numeric' => 'Nilai diskon harus berupa angka',
            'value.min' => 'Nilai diskon tidak boleh negatif',
            'minimum_purchase.numeric' => 'Pembelian minimum harus berupa angka',
            'minimum_purchase.min' => 'Pembelian minimum tidak boleh negatif',
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal',
            'end_date.required' => 'Tanggal berakhir wajib diisi',
            'end_date.date' => 'Tanggal berakhir harus berupa tanggal',
            'end_date.after_or_equal' => 'Tanggal berakhir harus sama atau setelah tanggal mulai',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        Discount::create($validated);

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Diskon berhasil ditambahkan');
    }

    /**
     * Update the specified discount
     */
    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:discounts,name,' . $discount->id,
            'type' => 'required|in:percent,nominal',
            'value' => 'required|numeric|min:0',
            'minimum_purchase' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'name.required' => 'Nama diskon wajib diisi',
            'name.unique' => 'Nama diskon sudah terdaftar',
            'name.max' => 'Nama diskon maksimal 255 karakter',
            'type.required' => 'Tipe diskon wajib dipilih',
            'type.in' => 'Tipe diskon harus persen atau nominal',
            'value.required' => 'Nilai diskon wajib diisi',
            'value.numeric' => 'Nilai diskon harus berupa angka',
            'value.min' => 'Nilai diskon tidak boleh negatif',
            'minimum_purchase.numeric' => 'Pembelian minimum harus berupa angka',
            'minimum_purchase.min' => 'Pembelian minimum tidak boleh negatif',
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal',
            'end_date.required' => 'Tanggal berakhir wajib diisi',
            'end_date.date' => 'Tanggal berakhir harus berupa tanggal',
            'end_date.after_or_equal' => 'Tanggal berakhir harus sama atau setelah tanggal mulai',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $discount->update($validated);

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Diskon berhasil diperbarui');
    }

    /**
     * Delete the specified discount
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Diskon berhasil dihapus');
    }
}
