<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::all();
        return view('masyarakat.index', compact('masyarakats'));
    }

    public function create()
    {
        return view('masyarakat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kk'      => 'required|numeric',
            'nomor_ktp'     => 'required|numeric|unique:masyarakats,nomor_ktp',
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
        ]);

        Masyarakat::create($validated);

        return redirect()->route('masyarakat.index')
                         ->with('success', 'Data warga ' . $request->nama . ' berhasil disimpan!');
    }

    public function show($id)
    {
        return 'Halo, ini adalah pesan dari Method SHOW untuk ID: ' . $id;
    }

    public function destroy(string $id)
    {
        return 'Halo, ini adalah pesan dari Method DESTROY untuk ID: ' . $id;
    }

    public function edit(String $id) {
        $masyarakat = Masyarakat::find($id);
        return view('masyarakat.edit', compact('masyarakat'));
    }

    public function update(Request $request, Masyarakat $masyarakat) 
    {
    $validated = $request->validate([
        'nomor_kk'      => 'required|numeric', 
        'nomor_ktp'     => 'required|numeric|unique:masyarakats,nomor_ktp,' . $masyarakat->id,
        'nama'          => 'required|string|max:255',
        'alamat'        => 'required|string',
        'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
    ], [
        'nomor_kk.required'     => 'Nomor KK wajib diisi.',
        'nomor_ktp.required'    => 'Nomor KTP harus diisi.',
        'nomor_ktp.numeric'     => 'Nomor KTP harus berupa angka.',
        'nomor_ktp.unique'      => 'Nomor KTP sudah terdaftar.',
        'alamat.required'       => 'Alamat harus diisi.',
        'jenis_kelamin.required' => 'Jenis Kelamin harus diisi.',
    ]);

    $masyarakat->update($request->except('nomor_ktp'));

    return redirect()->route('masyarakat.index');
    }
}
