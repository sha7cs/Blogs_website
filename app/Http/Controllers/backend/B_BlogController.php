<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class B_BlogController extends Controller
{
    public function index(){
       $blogs = Blog::all();
        return view('backend.dashboard.blogs.blogsIndex')->with('blogs',$blogs);

    }
    
    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('backend.dashboard.blogs.blogShows')->with('blog',$blog);
    }
    
    
    public function edit($id){
        $blog =Blog::findOrFail($id);
        return view('backend.dashboard.blogs.blogsEdit')->with('blog',$blog);
    }
    public function update($id ,Request $request ){
        $blog =Blog::where('id',$id)->update([
            "title"=>$request->title,
             "content"=>$request->content,

        ]);
        return redirect('/Back-end/blogs');
    }

    public function delete($id){
        $blog = Blog::findOrFail($id)->delete();
        return redirect('/Back-end/dashboard');
    }
}
