<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class PengaduanController extends Controller
{
    public function index($status) {
        $pengaduan = Pengaduan::where('status', $status)->orderBy('tgl_pengaduan', 'desc')->get();
        
        return view('pages.admin.pengaduan.index', compact('pengaduan', 'status'));
    }
    
    public function show($id_pengaduan) {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        return view('pages.admin.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
        ]);
    }

    public function destroy(Request $request, $id_pengaduan) {

        if($id_pengaduan = 'id_pengaduan') {
            $id_pengaduan = $request->id_pengaduan;
        }

        $pengaduan = Pengaduan::find($id_pengaduan);

        $pengaduan->delete();

        if($request->ajax()) {
            return 'success';
        }

        return redirect()->route('pengaduan.index');
    }
    public function storePengaduan(Request $request)
{
    if (!Auth::guard('masyarakat')->check()) {
        return redirect()->back()->with(['pengaduan' => 'Login dibutuhkan!', 'type' => 'error']);
    } elseif (Auth::guard('masyarakat')->user()->email_verified_at == null && Auth::guard('masyarakat')->user()->telp_verified_at == null) {
        return redirect()->back()->with(['pengaduan' => 'Akun belum diverifikasi!', 'type' => 'error']);
    }

    $data = $request->all();

    $validate = Validator::make($data, [
        'judul_laporan' => ['required'],
        'isi_laporan' => ['required'],
        'tgl_kejadian' => ['required'],
        'lokasi_kejadian' => ['required'],
    ]);

    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }

    if ($request->file('foto')) {
        $data['foto'] = $request->file('foto')->store('pengaduan', 'pengaduan'); 
    }

    date_default_timezone_set('Asia/Bangkok');

    $pengaduan = Pengaduan::create([
        'tgl_pengaduan' => date('Y-m-d h:i:s'),
        'nik' => Auth::guard('masyarakat')->user()->nik,
        'judul_laporan' => $data['judul_laporan'],
        'isi_laporan' => $data['isi_laporan'],
        'tgl_kejadian' => $data['tgl_kejadian'],
        'lokasi_kejadian' => $data['lokasi_kejadian'],
        'foto' => $data['foto'] ?? 'assets/pengaduan/tambakmekar.png',
        'status' => '0',
    ]);

    if ($pengaduan) {
        return redirect()->back()->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
    } else {
        return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'error']);
    }
}

}
