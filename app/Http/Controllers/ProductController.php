<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // ✅ API untuk menambahkan produk berdasarkan UMKM ID dengan Upload Gambar
    public function store(Request $request, $umkmId)
    {
        $umkm = UMKM::find($umkmId);
        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // Simpan ke storage
        }

        $product = Product::create([
            'umkm_id' => $umkm->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath ? Storage::url($imagePath) : null, // Simpan URL gambar
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'product' => $product
        ], 201);
    }

    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        // Validasi tetap berjalan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update field lain
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // Jika ada gambar baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                $oldImagePath = str_replace('/storage/', '', $product->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = Storage::url($imagePath);
        }


        $product->save();

        return response()->json([
            'message' => 'Produk berhasil diperbarui',
            'product' => $product
        ], 200);
    }


    // ✅ API untuk menghapus produk berdasarkan ID produk
    public function destroy($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        // Hapus gambar dari storage jika ada
        if ($product->image) {
            $imagePath = str_replace('/storage/', '', $product->image);
            Storage::disk('public')->delete($imagePath);
        }

        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }

    // ✅ API untuk mendapatkan semua produk berdasarkan UMKM ID
    public function getByUMKM($umkmId)
    {
        $umkm = UMKM::find($umkmId);
        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        return response()->json($umkm->products, 200);
    }
}
