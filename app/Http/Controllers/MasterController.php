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
}
