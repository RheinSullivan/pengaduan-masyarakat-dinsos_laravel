<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function index() {
        return view('pages.admin.laporan.index');
    }

    public function laporan(Request $request) {
        date_default_timezone_set('Asia/Bangkok');

        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        // Get data with or without filtering
        $pengaduan = Pengaduan::query();

        if ($date_from && $date_to) {
            $pengaduan->where('tgl_pengaduan', '>=', $date_from . ' 00:00:00')
                      ->where('tgl_pengaduan', '<=', $date_to . ' 23:59:59');
        }

        return view('pages.admin.laporan.index', [
            'pengaduan' => $pengaduan->get(),
            'from' => $date_from,
            'to' => $date_to,
        ]);
    }

    public function export(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        ini_set('max_execution_time', 120); // Increase max execution time if needed

        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        // Query Pengaduan data
        $pengaduan = Pengaduan::query();

        if ($date_from && $date_to) {
            $pengaduan->where('tgl_pengaduan', '>=', $date_from . ' 00:00:00')
                      ->where('tgl_pengaduan', '<=', $date_to . ' 23:59:59');
        }

        $pengaduan = $pengaduan->get();

        if ($pengaduan->isEmpty()) {
            // If no data, return a message or empty PDF.
            return PDF::loadHTML('<h1>No data found for this date range.</h1>')->stream('laporan.pdf');
        }

        // Render PDF with data
        $pdf = PDF::loadView('pages.admin.laporan.export', [
            'pengaduan' => $pengaduan,
            'from' => $date_from,
            'to' => $date_to,
        ]);

        // Set options like paper size, orientation, etc.
        $pdf->setPaper('A4', 'portrait'); // Example: set to A4 portrait layout

        return $pdf->stream('laporan.pdf'); // Stream PDF in browser
    }
}
