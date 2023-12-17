<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Admin;
use DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function getData()
    {
        $admins = Admin::select(['id', 'name', 'email']);

        return DataTables::of($admins)
            ->addColumn('action', function ($admin) {
                return '<button class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#editModal" data-id="'.$admin->id.'">Edit</button>';
            })
            ->make(true);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
           
        ]);

        $admin = Admin::create($request->all());

        return response()->json(['success' => true, 'message' => 'Data added successfully']);
    }

    public function edit($id)
{
    $admin = Admin::findOrFail($id);

    return response()->json(['admin' => $admin]);
}
}
