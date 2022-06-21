<?php

namespace App\Http\Controllers;

use App\Models\DaftarSidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\JadwalSidang;
use App\Models\Mahasiswa;

class KonfirmasiController extends Controller
{
    public function index()
    {
        return view('dosen.konfirmasi');
    }

    public function readBerkas($judul)
    {
        $data = DaftarSidang::where("judul_ta", $judul)->first();
        return response()->file(storage_path('app/' . $data->berkas));
    }

    public function verif($id)
    {
        $data = DaftarSidang::findOrFail($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('dosen.konfirmasi.index')->with('sukses', "<strong>Berhasil</strong> verifikasi pendaftaran");
    }

    public function getDataSidang()
    {
        return DataTables::of(DaftarSidang::select(['id', 'id_mhs', 'judul_ta', 'nilai_akhir', 'berkas', 'status'])->get())
            ->editColumn('id_mhs', function ($data) {
                $user = DB::table('user')->select(['name'])->where('id', $data->mahasiswa->id_user)->first();
                return $user->name;
            })
            ->editColumn('berkas', function ($data) {
                return '<a target="_blank" href="' . route("dosen.konfirmasi.read", $data->judul_ta) . '" class="btn btn-info">Lihat Berkas</a>';
            })
            ->editColumn('status', function ($data) {
                if ($data->status) {
                    return '<button type="button" class="btn btn-success"><i class="fas fa-check"></i></button>';
                } else {
                    return '<button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>';
                }
            })
            ->addColumn('aksi', function ($data) {
                if ($data->status == 0) {
                    return '<a href="' . route('dosen.konfirmasi.verif', $data->id) . '" class="btn btn-success">Verifikasi</a>';
                } else {
                    return '<a href="javascript:void(0)" class="btn btn-success disabled">Verifikasi</a>';
                }
            })
            ->rawColumns(['aksi', 'status', 'berkas'])
            ->make(true);
    }

    public function jadwal()
    {
        return view('dosen.jadwal');
    }

    public function verifJadwal($id)
    {
        $jadwal = JadwalSidang::findOrFail($id);
        $jadwal->status = 1;
        $jadwal->save();

        return redirect()->route('dosen.jadwal.index')->with('sukses', '<strong>Berhasil</strong> verifikasi jadwal');
    }

    public function getJadwal()
    {
        $jadwal = JadwalSidang::select(['id', 'tanggal', 'status', 'id_mhs'])->get();
        $user = Mahasiswa::all();

        $json = [];

        foreach ($user as $data) {
            $json['title'] = $data->user->name;
        }

        foreach ($jadwal as $data) {
            $json['start'] = $data->tanggal;
            $json['allDay'] = false;
            if ($data->status == 0) {
                $json['url'] = route('dosen.jadwal.verif', $data->id);
                $json['backgroundColor'] = "#d9534f";
                $json['borderColor'] = "#d9534f";
            } else {
                $json['backgroundColor'] = "#5cb85c";
                $json['borderColor'] = "#5cb85c";
            }
        }

        return response()->json([$json]);
    }
}
