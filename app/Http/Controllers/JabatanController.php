<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('admin.jabatan', compact('jabatan')); 
    }

    public function tambahjabatan()
    {
        return view('tambahdata.tambah_jabatan');
    }

    public function insertjabatan(Request $request)
    {
        $request->validate([
            'id_jabatan' => 'required|unique:jabatan,id_jabatan',
            'jabatan' => 'required|string',
        ]);
    
        // Mendapatkan input data dari form
        $data = $request->all();
    
        // Menambahkan nilai default 0 untuk gaji_pokok dan tunjangan_jabatan
        $data['gaji_pokok'] = 0;
        $data['tunjangan_jabatan'] = 0;
    
        // Membuat jabatan baru dengan data yang telah dimodifikasi
        Jabatan::create($data);
        
        return redirect()->route('jabatan')->with('success', 'Data Berhasil Ditambahkan');
    }
    
    public function tampiljabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('admin.tampil_jabatan', compact('jabatan'));
    }

    public function editjabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('editdata.edit_jabatan', compact('jabatan'));
    }

    public function updatejabatan(Request $request, $id)
    {
        $request->validate([
            'id_jabatan' => 'required|unique:jabatan,id_jabatan',
            'jabatan' => 'required|string',
            'gaji_pokok' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric',
        ],[
            'id_jabatan.unique' => 'ID Jabatan sudah ada.',
        ]
    );

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());

        return redirect()->route('jabatan')->with('success', 'Data Berhasil Diperbarui');
    }

    public function deleteJabatan($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus');
    }

    public function edit($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('updatedata.edit_jabatan', compact('jabatan'));
    }

    // Menangani pembaruan data jabatan
    public function update(Request $request, $id_jabatan)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric',
        ]);

        $jabatan = Jabatan::findOrFail($id_jabatan);
        $jabatan->update($request->all());

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diperbarui');
    }

}
