<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Atur ke true jika semua user bisa akses
    }

    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:0',
            'source' => 'required|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
}
