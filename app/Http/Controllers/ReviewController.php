<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
   public function store(Request $request)
{
    $validated = $request->validate([
        'umkm_id' => 'required|exists:u_m_k_m_s,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
        'guest_name' => 'nullable|string',
    ]);

    $review = Review::create([
        'umkm_id' => $validated['umkm_id'],  // ambil nilai yang benar
        'rating' => $validated['rating'],
        'comment' => $validated['comment'] ?? null,
        'guest_name' => $validated['guest_name'] ?? null,
        'ip_address' => $request->ip(),
    ]);

    return response()->json(['message' => 'Review submitted', 'data' => $review], 201);
}

public function index(Request $request)
{
    $request->validate([
        'umkm_id' => 'required|exists:u_m_k_m_s,id',
    ]);

    $umkmId = $request->input('umkm_id');

    // Ambil review berdasarkan umkm_id
    $reviews = Review::where('umkm_id', $umkmId)->orderBy('created_at', 'desc')->get();

    return response()->json([
        'data' => $reviews
    ]);
}

}