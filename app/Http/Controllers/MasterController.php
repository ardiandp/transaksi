<?php

namespace App\Http\Controllers;
use App\Models\Gerai;
use App\Models\Perawatan;
use App\Models\User;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    
    public function gerai()
    {
        $gerai = Gerai::all();
        return view('master.gerai.index', compact('gerai'));
    }

    public function geraistore(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:gerai,kode',
            'nama_gerai' => 'required',
            'status' => 'required|in:aktif,tidak_aktif'
        ]);

        Gerai::create([
            'kode' => $request->kode,
            'nama_gerai' => $request->nama_gerai,
            'status' => $request->status
        ]);

        return redirect()->route('master.gerai')->with('success', 'Data berhasil disimpan');
    }

    
    public function geraiupdate(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|unique:gerai,kode,'.$id,
            'nama_gerai' => 'required',
            'status' => 'required|in:aktif,tidak_aktif'
        ]);

        $gerai = Gerai::findOrFail($id);
        $gerai->update([
            'kode' => $request->kode,
            'nama_gerai' => $request->nama_gerai,
            'status' => $request->status
        ]);

        return redirect()->route('master.gerai')->with('success', 'Data berhasil diupdate');
    }

    
    public function geraidestroy($id)
    {
        $gerai = Gerai::findOrFail($id);
        $gerai->delete();
        return redirect()->route('master.gerai')->with('success', 'Data berhasil dihapus');
    }

    
    public function perawatan()
    {
        $perawatan = Perawatan::all();
        return view('master.perawatan.index', compact('perawatan'));
    }

    public function perawatancreate()
    {
        return view('master.perawatan.create');
    }

    
    public function perawatanedit($id)
    {
        $perawatan = Perawatan::find($id);
        return view('master.perawatan.edit', compact('perawatan'));
    }
    

    
    
    public function perawatanstore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'durasi' => 'nullable|integer',
            'harga' => 'required|integer'
        ]);

        Perawatan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
            'harga' => $request->harga
        ]);

        return redirect()->route('master.perawatan')->with('success', 'Data berhasil disimpan');
    }
    
    public function perawatanupdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'durasi' => 'nullable|integer',
            'harga' => 'required|integer'
        ]);

        $perawatan = Perawatan::findOrFail($id);
        $perawatan->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
            'harga' => $request->harga
        ]);

        return redirect()->route('master.perawatan')->with('success', 'Data berhasil diupdate');
    }

    
    public function perawatandestroy($id)
    {
        $perawatan = Perawatan::findOrFail($id);
        $perawatan->delete();
        return redirect()->route('master.perawatan')->with('success', 'Data berhasil dihapus');
    }

    
}
