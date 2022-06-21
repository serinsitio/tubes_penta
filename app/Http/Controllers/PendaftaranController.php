<?php

namespace App\Http\Controllers;

use App\Models\DaftarSidang;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $data['mahasiswa'] = Mahasiswa::where('id_user', $id)->first();
        if (isset($data['mahasiswa'])) {
            $data['daftar_sidang'] = DaftarSidang::where('id_mhs', $data['mahasiswa']->id)->first();
        }
        return view('mahasiswa.pendaftaran.index', $data);
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'judul_ta' => 'required',
            'nilai_akhir' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'berkas' => 'required|mimetypes:application/pdf|max:5120',
        ]);

        if ($req->file()) {
            $fileName = Auth::user()->name . '_berkas.' . $req->file('berkas')->extension();
            $filePath = Storage::putFileAs('public/sidang', $req->berkas, $fileName);

            $mahasiswa = new Mahasiswa;
            $mahasiswa->id_user = Auth::id();
            $mahasiswa->nim = $req->nim;
            $mahasiswa->prodi = $req->prodi;
            $mahasiswa->save();

            $mhs_id = Mahasiswa::select('id')->orderByDesc('id')->limit(1)->first();

            $daftar_sidang = new DaftarSidang;
            $daftar_sidang->nilai_akhir = $req->nilai_akhir;
            $daftar_sidang->judul_ta = $req->judul_ta;
            $daftar_sidang->berkas = $filePath;
            $daftar_sidang->status = 0;
            $daftar_sidang->id_mhs = $mhs_id->id;
            $daftar_sidang->save();

            return redirect()->route('pendaftaran.index')->with('sukses', "<strong>Berhasil</strong> melakukan pendaftaran");
        }

        return redirect()->route('pendaftaran.index')->with('gagal', "<strong>Gagal</strong> melakukan pendaftaran");
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'judul_ta' => 'required',
            'nilai_akhir' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'berkas' => 'required|mimetypes:application/pdf|max:5120',
        ]);

        if ($req->file()) {
            $fileName = Auth::user()->name . '_berkas.' . $req->file('berkas')->extension();
            $filePath = Storage::putFileAs('public/sidang', $req->berkas, $fileName);

            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->id_user = Auth::id();
            $mahasiswa->nim = $req->nim;
            $mahasiswa->prodi = $req->prodi;
            $mahasiswa->save();

            $mhs_id = Mahasiswa::select('id')->orderByDesc('id')->limit(1)->first();

            $daftar_sidang = new DaftarSidang;
            $daftar_sidang->nilai_akhir = $req->nilai_akhir;
            $daftar_sidang->judul_ta = $req->judul_ta;
            $daftar_sidang->berkas = $filePath;
            $daftar_sidang->status = 0;
            $daftar_sidang->id_mhs = $mhs_id->id;
            $daftar_sidang->save();

            return redirect()->route('pendaftaran.index')->with('sukses', "<strong>Berhasil</strong> melakukan pendaftaran");
        }

        return redirect()->route('pendaftaran.index')->with('gagal', "<strong>Gagal</strong> melakukan pendaftaran");
    }
}
