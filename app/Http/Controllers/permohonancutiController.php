<?php

namespace App\Http\Controllers;
use App\Models\Cuti;

use Illuminate\Http\Request;

class permohonancutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::all();
        return view('admin.permohonancuti', ['cuti' => $cuti]);
    }
}
