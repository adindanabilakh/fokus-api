<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Models\Income;
use App\Models\UMKM;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $umkm = auth()->guard('umkm')->user(); // Gunakan guard 'umkm'

        if (!$umkm) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $incomes = Income::where('umkm_id', $umkm->id)->latest()->get();

        if ($incomes->isEmpty()) {
            return response()->json(['message' => 'No income records found'], 404);
        }

        return response()->json($incomes);
    }

    public function store(IncomeRequest $request)
    {
        $umkm = auth()->guard('umkm')->user();
        $admin = auth()->guard('admin')->user();

        if (!$umkm && !$admin) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validatedData = $request->validated();
        $validatedData['date'] = $validatedData['date'] . '-01';

        // Ambil umkm_id
        $umkmId = $umkm ? $umkm->id : $request->input('umkm_id');

        if (!$umkmId) {
            return response()->json(['message' => 'UMKM ID is required'], 422);
        }

        $income = Income::create($validatedData + ['umkm_id' => $umkmId]);

        return response()->json(['message' => 'Income added successfully', 'income' => $income], 201);
    }



    public function show($id, Request $request)
    {
        $umkm = auth()->guard('umkm')->user();

        if (!$umkm) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $income = Income::where('id', $id)->where('umkm_id', $umkm->id)->first();

        if (!$income) {
            return response()->json(['message' => 'Income not found'], 404);
        }

        return response()->json($income);
    }

    public function update(IncomeRequest $request, $id)
    {
        $umkm = auth()->guard('umkm')->user();

        if (!$umkm) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $income = Income::where('id', $id)->where('umkm_id', $umkm->id)->first();

        if (!$income) {
            return response()->json(['message' => 'Income not found'], 404);
        }

        $validatedData = $request->validated();
        $validatedData['date'] = $validatedData['date'] . '-01'; // 🔥 Pastikan format "YYYY-MM-DD"

        $income->update($validatedData);

        return response()->json(['message' => 'Income updated successfully', 'income' => $income]);
    }


    public function destroy($id, Request $request)
    {
        $umkm = auth()->guard('umkm')->user();

        if (!$umkm) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $income = Income::where('id', $id)->where('umkm_id', $umkm->id)->first();

        if (!$income) {
            return response()->json(['message' => 'Income not found'], 404);
        }

        $income->delete();

        return response()->json(['message' => 'Income deleted successfully']);
    }

    // ✅ GET Income by UMKM ID
    public function getIncomeByUMKM($umkm_id)
    {
        $umkm = UMKM::find($umkm_id);

        if (!$umkm) {
            return response()->json(['message' => 'UMKM tidak ditemukan'], 404);
        }

        $income = Income::where('umkm_id', $umkm_id)->get();

        if ($income->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data income untuk UMKM ini'], 404);
        }

        return response()->json([
            'umkm' => [
                'id' => $umkm->id,
                'name' => $umkm->name,
                'email' => $umkm->email,
            ],
            'income' => $income
        ], 200);
    }
}
