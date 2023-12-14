<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function getData()
    {
        $users = User::select(['id', 'name', 'email']);
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<button class="btn btn-sm btn-info">Edit</button>';
            })
            ->make(true);
    }
}
