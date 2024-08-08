<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Blog;
use DB;
use App\Models\User;

class WrittersController extends Controller
{
    //Call to undefined relationship [user] on model [App\Models\Blog].
    public function index()
    {
        $blogs = Blog::all();
        $users = User::all()->keyBy('id'); // Keying users by their ID for easy lookup
        return view('backend.dashboard.writters.writtersCreate', compact('blogs', 'users'));
    }

    public function accept($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = 1;
        $blog->save();
    
        return redirect()->back()->with('success', 'Blog accepted successfully');
    }
    public function reject($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = 0;
        $blog->save();

        return redirect()->back()->with(['message' => 'Blog rejected successfully']);
    }};