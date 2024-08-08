<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use DB;
class AppController extends Controller
{
    public function index(){
        //$blogs = DB::table('blogs')->get();
        $blogs = blog::all();
        return view('backend.dashboard.layout.app')->with('blogs',$blogs);

    }
}
