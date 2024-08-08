<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Blog;
use App\Models\User;
use Storage;
class BlogController extends Controller
{
    public function index(){
        return view('frontend.blogs.myblogs');
    }
    
    public function create(){
        return view('frontend.blogs.addblog');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string|min:10',
            'image' => 'required|max:2048|mimes:jpg,png,gif',
        ]);

       
        
            $path = $request->file('image')->store('blogs', 'public');
        
        $blog = Blog::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "image"=> $path,
            "user_id"=>Auth::user()->id
        ]);

        return back()->with("success","blog created");
    }


    public function show($user_id){
        $user = auth()->user();
        $blogs=Blog::where("user_id",$user_id)->get();
        return view("frontend.blogs.myblogs")->with("blogs",$blogs);
    }

    public function show2($id){
        $blogs=Blog::where("id",$id)->first();
        return view("frontend.blogs.show")
        ->with("blogs",$blogs);
    }

    public function edit($id){
        $blog = Blog::findOrfail($id);

      return view('frontend.blogs.edit')
      ->with('blog',$blog);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string|min:10',
            'image' => 'nullable|max:2048|mimes:jpg,png,gif',
        ]);
    
        $blog = Blog::findOrFail($id);
    
        // Update the blog post with the new data
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::user()->id;
    
        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
          if ($blog->image) {
                Storage::delete($blog->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        }
    
        // Save the updated blog post
        $blog->save();
    
        return back();
    }

    public function delete(Request $request, $id){
        $blog = Blog::findOrFail($id)->delete();
        return redirect("/");
    }

    public function showblogs(){
        $blogs=Blog::where("is_published",1)->orderBy("created_at","desc")->get();
        return view("frontend.blogs.index")->with("blogs",$blogs);
    }

    public function showlimited(){
        $blogs=Blog::where("is_published",1)->orderBy("created_at","desc")->limit(3)->get();
        return view("frontend.home")->with("blogs",$blogs);
    }
    // public function profile($id){
    //     $user = User::findOrFail($id);

    //     return view('frontend.layouts.profile')
    //      ->with('user',$user);
    // }
}
