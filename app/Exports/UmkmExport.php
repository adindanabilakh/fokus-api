<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class UmkmExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('u_m_k_m_s')
            ->select('u_m_k_m_s.id', 'u_m_k_m_s.name', 'u_m_k_m_s.type', 'u_m_k_m_s.status', 'u_m_k_m_s.address', 'u_m_k_m_s.open_time', 'u_m_k_m_s.close_time', 'u_m_k_m_s.email', 'u_m_k_m_s.phone_number', 'u_m_k_m_s.description')
            ->orderByRaw('u_m_k_m_s.created_at ASC')
            ->get();

        return view('umkm.excel', [
            'list' => $data
        ]);
    }
	
	public function styles(Worksheet $sheet)
    {
        // Aktifkan word wrap untuk seluruh sheet
        $sheet->getStyle('A1:Z100')->getAlignment()->setWrapText(true);
        return [];
    }
}
