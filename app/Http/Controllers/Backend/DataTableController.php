<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function fetchUsers(): \Illuminate\Http\JsonResponse
    {
        $query =  User::all(['id', 'name', 'username', 'email', 'phone', 'role']);


        return datatables()
            ->of($query)
            ->addColumn('actions', function ($row) {
                $btn = '';
                $btn = '<a href="'.route('backend.users.edit',$row).'" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn.'<a  href="' . route('backend.users.destroy', $row) . '"  class="edit btn btn-danger btn-sm delete " id="'.$row->id.'">Delete</a>';
                return $btn;

            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
