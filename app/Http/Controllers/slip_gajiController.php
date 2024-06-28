<?php

namespace App\Http\Controllers;

use App\Models\Slipgaji;
use Illuminate\Http\Request;

class slip_gajiController extends Controller
{
    public function index()
    {
        $slipgaji = SlipGaji::all();
        return view('admin/slip_gaji',compact('slipgaji'));
    }


    public function tambah()
    {
        return view('tambahdata.tambah_slip_gaji');
    }

    public function simpanSlipGaji(Request $request)
    {
        // Validasi data yang dikirimkan oleh form
        $request->validate([
            'jabatan' => 'required',
            'pendapatan' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);

        // Simpan data slip gaji baru ke database
        SlipGaji::create([
            'jabatan' => $request->jabatan,
            'pendapatan' => $request->pendapatan,
            'potongan' => $request->potongan,
        ]);

        // Redirect ke halaman slip gaji dengan pesan sukses
        return redirect()->route('slip_gaji.index')->with('success', 'Data slip gaji berhasil ditambahkan.');
    }

    public function insertkaryawan(Request $request)
    {
        // Validasi data sebelum disimpan jika diperlukan
        $request->validate([
            'id_gaji' => 'required',
            'no_slip' => 'required',
            'tanggal' => 'required|numeric',
            'jabatan' => 'required|numeric',
            'pendapatan' => 'required',
            'potongan' => 'required',
        ]);

        // Buat data karyawan baru dengan data dari request
        Slipgaji::create($request->all());
        
        // Redirect kembali ke halaman karyawan dengan pesan sukses
        return redirect()->route('karyawan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id_gaji)
    {
        $slipgaji = SlipGaji::findOrFail($id_gaji);
        return view('updatedata.edit_slip_gaji', compact('slipgaji'));
    }

    // Menyimpan perubahan data slip gaji
    public function update(Request $request, $id_gaji)
    {
        // Validasi data yang dikirimkan oleh form
        $request->validate([
            'jabatan' => 'required',
            'pendapatan' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);

        // Cari slip gaji berdasarkan id dan update data
        $slipgaji = SlipGaji::findOrFail($id_gaji);
        $slipgaji->update([
            'jabatan' => $request->jabatan,
            'pendapatan' => $request->pendapatan,
            'potongan' => $request->potongan,
        ]);

        // Redirect ke halaman slip gaji dengan pesan sukses
        return redirect()->route('slip_gaji.index')->with('success', 'Data slip gaji berhasil diupdate.');
    }

    public function delete($id)
    {
        $slipGaji = SlipGaji::findOrFail($id);
        $slipGaji->delete();

        return redirect()->route('slip_gaji.index')->with('success', 'Slip gaji berhasil dihapus.');
    }
}
