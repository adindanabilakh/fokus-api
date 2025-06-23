<?php

namespace App\Http\Controllers;

use App\Mail\UMKMRegistered;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UmkmAuthController extends Controller
{
    public function register(Request $request)
    {
        // ✅ Validasi Input
        $validated = $request->validate([
            'name' => 'required|string|unique:u_m_k_m_s,name|max:255',
            'type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'location_url' => 'nullable|string|url',
            'email' => 'required|string|email|unique:u_m_k_m_s,email',
            'password' => 'required|string|min:6|confirmed',
            'document' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // ✅ Simpan File jika ada
        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('umkm_documents', 'public');
        }

        // ✅ Buat UMKM baru dengan status "Pending"
        $umkm = UMKM::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'status' => 'Pending',
            'address' => $validated['address'],
            'location_url' => $validated['location_url'] ?? '',
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'document' => $documentPath,
        ]);

        // ✅ Kirim email ke user yang baru daftar
        Mail::to($validated['email'])->send(new UMKMRegistered($umkm));

        return response()->json([
            'message' => 'Your account has been registered successfully and is pending approval by the admin.',
            'status' => 'Pending',
            'umkm' => $umkm,
        ], 201);
    }



    public function login(Request $request)
    {
        header('Content-Type: application/json'); // ✅ Pastikan API hanya merespons JSON

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $umkm = UMKM::where('email', $credentials['email'])->first();

        if (!$umkm || !Hash::check($credentials['password'], $umkm->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // 🔥 Tambahkan pengecekan status UMKM
        if ($umkm->status === 'Pending') {
            return response()->json([
                'message' => 'Your account is pending approval by the admin. Please wait for verification.'
            ], 403);
        }

        $token = $umkm->createToken('umkm-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'umkm' => $umkm,
            'token' => $token,
        ], 200);
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // ✅ Hapus semua token aktif

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function me(Request $request)
    {
        // 🔥 Jika UMKM terkait user_id, sesuaikan dengan database
        $umkm = UMKM::find(auth('sanctum')->id());

        if (!$umkm) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'id' => $umkm->id,
            'name' => $umkm->name,
            'type' => $umkm->type,
            'status' => $umkm->status,
            'description' => $umkm->description,
            'address' => $umkm->address,
            'location_url' => $umkm->location_url,
            'email' => $umkm->email,
            'phone_number' => $umkm->phone_number, // ✅ Tambahkan
            'document' => $umkm->document ? asset('storage/' . $umkm->document) : null, // ✅ Pastikan URL bisa diakses
            'images' => $umkm->images ? json_decode($umkm->images) : [], // ✅ Decode JSON jika ada
            'open_time' => $umkm->open_time, // ✅ Tambahkan ke response
            'close_time' => $umkm->close_time, // ✅ Tambahkan ke response
            'created_at' => $umkm->created_at,
            'updated_at' => $umkm->updated_at,
        ]);
    }

    public function sendResetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $umkm = UMKM::where('email', $request->email)->first();

        if (!$umkm) {
            return response()->json(['message' => 'Email tidak ditemukan'], 404);
        }

        $token = Str::random(64);

        // Simpan token
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($token),
                'created_at' => now()
            ]
        );

        // Kirim email reset
        Mail::to($request->email)->send(new ResetPasswordMail($request->email, $token));

        return response()->json(['message' => 'Link reset password telah dikirim ke email Anda']);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $record = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$record) {
            return response()->json(['message' => 'Token tidak ditemukan'], 404);
        }

        if (!Hash::check($request->token, $record->token)) {
            return response()->json(['message' => 'Token tidak valid'], 400);
        }

        if (now()->diffInMinutes($record->created_at) > 60) {
            return response()->json(['message' => 'Token kadaluarsa'], 400);
        }

        $umkm = UMKM::where('email', $request->email)->first();
        if (!$umkm) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $umkm->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return response()->json(['message' => 'Password berhasil diubah']);
    }
}
