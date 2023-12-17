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
                    $btn = "<a href='javascript:void(0)' class='edit btn btn-primary btn-sm' data-toggle='modal' data-target='#editModal' data-id='{{ $row->id }}'>Edit</a>";
                    $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id="'.$row->id.'" onclick="deleteData('.$row->id.')">Hapus</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('norek.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'atas_nama' => 'required',
            'alias' => 'required',
            'norek' => 'required',
            'bank' => 'required',
        ]);

        $norek = Norek::create($request->all());

        return response()->json(['success' => true, 'message' => 'Data added successfully']);
    }


    public function edit($id)
{
    $norek = Norek::findOrFail($id);
    return response()->json($norek);
}

 public function update(Request $request, $id)
    {
        $request->validate([
            'atas_nama' => 'required',
            'alias' => 'required',
            'norek' => 'required',
            'bank' => 'required',
        ]);

        $norek = Norek::findOrFail($id);
        $norek->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data updated successfully']);
    }

    // app/Http/Controllers/NorekController.php

    public function destroy($id)
    {
        $norek = Norek::find($id);
    
        if (!$norek) {
            return response()->json(['message' => 'Data not found.'], 404);
        }
    
        $norek->delete();
    
        return response()->json(['message' => 'Data deleted successfully.']);
    }

    //
}  