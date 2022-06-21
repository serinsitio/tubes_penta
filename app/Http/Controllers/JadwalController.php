<?php

namespace App\Http\Controllers;

use App\Models\DaftarSidang;
use App\Models\JadwalSidang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $data['mahasiswa'] = Mahasiswa::where('id_user', Auth::id())->first();
        if (isset($data['mahasiswa'])) {
            $data['jadwal_sidang'] = JadwalSidang::where('id_mhs', $data['mahasiswa']->id)->first();
        }
        return view('mahasiswa.jadwal.index', $data);
    }

    public function create()
    {
        return view('mahasiswa.jadwal.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'tanggal' => "required",
        ]);

        $id_mhs = Mahasiswa::where('id_user', Auth::id())->first();

        $jadwal_sidang = new JadwalSidang;
        $jadwal_sidang->tanggal = date('Y-m-d H:i:s', strtotime($req->tanggal));
        $jadwal_sidang->status = 0;
        $jadwal_sidang->id_mhs = $id_mhs->id;
        $jadwal_sidang->save();

        return redirect()->route('jadwal.index')->with('sukses', '<strong>Berhasil</strong> menambahkan jadwal');
    }

    public function edit($id)
    {
        $data['jadwal_sidang'] = JadwalSidang::select(['id', 'tanggal'])->where('id', $id)->first();
        return view('mahasiswa.jadwal.edit', $data);
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'tanggal' => "required",
        ]);

        $id_mhs = Mahasiswa::where('id_user', Auth::id())->first();

        $jadwal_sidang = JadwalSidang::findOrFail($id);
        $jadwal_sidang->tanggal = date('Y-m-d H:i:s', strtotime($req->tanggal));
        $jadwal_sidang->status = 0;
        $jadwal_sidang->id_mhs = $id_mhs->id;
        $jadwal_sidang->save();

        return redirect()->route('jadwal.index')->with('sukses', '<strong>Berhasil</strong> mengedit jadwal');
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
                $json['url'] = route('jadwal.edit', $data->id);
                $json['backgroundColor'] = "#d9534f";
                $json['borderColor'] = "#d9534f";
            } else {
                $json['backgroundColor'] = "#5cb85c";
                $json['borderColor'] = "#5cb85c";
            }
        }

        // $data = [
        //     "title" => "Penta",
        //     "start" => "2022-06-18 09:30",
        //     "allDay" => false,
        //     "backgroundColor" => "#5cb85c",
        //     "borderColor" => "#5cb85c"
        // ];

        return response()->json([$json]);
    }
}
