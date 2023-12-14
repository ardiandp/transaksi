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
                return '<button class="btn btn-sm btn-info">Edit</button>';
            })
            ->make(true);

    }
}
