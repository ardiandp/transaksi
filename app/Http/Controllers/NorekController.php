<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Norek;
use Yajra\DataTables\Facades\DataTables;
//use Datatables;

class NorekController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $data = Norek::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" data-id="{{ $row->id }}">Edit</a>  ';
                    $btn .= ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('norek.index');
    }

    public function edit($id)
{
    $norek = Norek::findOrFail($id);
    return response()->json($norek);
}

public function update(Request $request, $id)
{
    $norek = Norek::findOrFail($id);
    $norek->nomor_rekening = $request->nomor_rekening;
    $norek->nama_pemilik = $request->nama_pemilik;
    $norek->save();

    return response()->json(['success' => 'Data Norek berhasil diupdate']);
}
    //
}  