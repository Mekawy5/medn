<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = array(
            'users'        => DB::table('users')->count(),
            'posts'        => DB::table('posts')->count(),
            'categories'   => DB::table('categories')->count(),
            'photos'       => DB::table('photos')->count(),
            'admins'       => DB::table('users')->where('role_id',1)->count(),
            'authors'       => DB::table('users')->where('role_id',2)->count(),
        );
        return view('admin/index',compact('stats'));
    }
}
