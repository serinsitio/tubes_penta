<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApprovalController extends Controller
{
    public function index()
    {
        $data['mahasiswa'] = Mahasiswa::all();
        return view('mahasiswa.approval.index', $data);
    }
}
