<?php

namespace App\Http\Controllers;

use App\Mail\UMKMApproved;
use App\Mail\UMKMRejected;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class UMKMController extends Controller
{

    // ✅ GET all UMKM
    public function index()
    {
        return response()->json(UMKM::all(), 200);
    }

    // ✅ GET single UMKM
    public function show($id)
    {
        $umkm = UMKM::with('products')->find($id);

        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        // ✅ Format ulang gambar agar bisa diakses jika disimpan di storage
        foreach ($umkm->products as $product) {
            if ($product->image && !filter_var($product->image, FILTER_VALIDATE_URL)) {
                $product->image = asset($product->image);
            }
        }

        return response()->json($umkm, 200);
    }


    // ✅ POST create UMKM
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:u_m_k_m_s|max:255',
            'type' => 'required|string',
            'status' => 'required|in:Active,Pending,Inactive',
            'address' => 'required|string',
            'location_url' => 'required|url',
            'email' => 'required|email|unique:u_m_k_m_s',
            'password' => 'required|min:6',
            'description' => 'nullable|string', // 🔥 Tambahkan description opsional
            'open_time' => 'nullable|date_format:H:i', // ✅ Validasi jam buka
            'close_time' => 'nullable|date_format:H:i|after:open_time', // ✅ Validasi jam tutup harus setelah jam buka
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $umkm = UMKM::create([
            'name' => $request->name,
            'type' => $request->type,
            'status' => $request->status,
            'address' => $request->address,
            'location_url' => $request->location_url,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'description' => $request->description, // 🔥 Simpan description jika ada
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
        ]);


        return response()->json([
            'message' => 'UMKM berhasil ditambahkan',
            'umkm' => $umkm
        ], 201);
    }

    // ✅ PUT update UMKM
    public function update(Request $request, $id)
    {
        $umkm = UMKM::find($id);
        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|max:255|unique:u_m_k_m_s,name,' . $id,
            'type' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:Active,Pending,Inactive',
            'address' => 'sometimes|required|string',
            'location_url' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:u_m_k_m_s,email,' . $id,
            'phone_number' => 'sometimes|nullable|string|max:15',
            'password' => 'nullable|min:6',
            'document' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // 🆕 Validasi document
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 🆕 Validasi multi-image
            'description' => 'nullable|string', // 🔥 Tambahkan description opsional
            'open_time' => 'nullable|date_format:H:i',
            'close_time' => 'nullable|date_format:H:i|after:open_time',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Debugging: Cek apakah file diterima
        Log::info('Document:', [$request->file('document')]);
        Log::info('Images:', [$request->file('images')]);

        // Simpan document jika ada
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('umkm_documents', 'public');
            $umkm->document = $documentPath;
        }

        // Simpan multi images jika ada
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('umkm_images', 'public');
            }
            $umkm->images = json_encode($imagePaths);
        }

        // Update data UMKM
        $umkm->update([
            'name' => $request->name ?? $umkm->name,
            'type' => $request->type ?? $umkm->type,
            'status' => $request->status ?? $umkm->status,
            'address' => $request->address ?? $umkm->address,
            'location_url' => $request->location_url ?? $umkm->location_url,
            'email' => $request->email ?? $umkm->email,
            'phone_number' => $request->phone_number ?? $umkm->phone_number,
            'password' => $request->password ? Hash::make($request->password) : $umkm->password,
            'description' => $request->description ?? $umkm->description, // 🔥 Update description jika ada
            'open_time' => $request->open_time ?? $umkm->open_time,
            'close_time' => $request->close_time ?? $umkm->close_time,
        ]);

        return response()->json([
            'message' => 'UMKM berhasil diperbarui',
            'umkm' => $umkm
        ], 200);
    }




    // ✅ APPROVE UMKM
    public function approveUMKM($id)
    {
        $umkm = UMKM::find($id);
        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        if ($umkm->status === 'Active') {
            return response()->json(['message' => 'UMKM sudah disetujui'], 400);
        }

        $umkm->update(['status' => 'Active']);

        // ✅ Kirim email konfirmasi
        Mail::to($umkm->email)->send(new UMKMApproved($umkm));

        return response()->json([
            'message' => 'UMKM berhasil disetujui',
            'umkm' => $umkm
        ], 200);
    }


    // ✅ REJECT UMKM
    public function rejectUMKM($id)
    {
        $umkm = UMKM::find($id);
        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        if ($umkm->status === 'Rejected') {
            return response()->json(['message' => 'UMKM sudah ditolak sebelumnya'], 400);
        }

        $umkm->update(['status' => 'Rejected']);

        // ✅ Kirim email penolakan
        Mail::to($umkm->email)->send(new UMKMRejected($umkm));

        return response()->json([
            'message' => 'UMKM berhasil ditolak',
            'umkm' => $umkm
        ], 200);
    }



    // ✅ DELETE UMKM
    public function destroy($id)
    {
        $umkm = UMKM::find($id);
        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        $umkm->delete();

        return response()->json(['message' => 'UMKM berhasil dihapus'], 200);
    }

    public function downloadPdf()
	{
		$data = DB::table('u_m_k_m_s')
				->select('u_m_k_m_s.id', 'u_m_k_m_s.name', 'u_m_k_m_s.type', 'u_m_k_m_s.status', 'u_m_k_m_s.address', 'u_m_k_m_s.open_time', 'u_m_k_m_s.close_time', 'u_m_k_m_s.email', 'u_m_k_m_s.phone_number', 'u_m_k_m_s.description')
				->orderByRaw('u_m_k_m_s.created_at ASC')
				->get();

		$pdf = Pdf::loadView('umkm.pdf', [
			'list' => $data,
		])->setPaper('A4', 'landscape');

		return $pdf->download('umkm_' . now()->format('Ymd_His') . '.pdf');
	}
}
