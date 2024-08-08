<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
//use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\User;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(){
        $user = Auth::user();
        return view('backend.dashboard.UserProfile.editProfile')->with('user', $user);
    }
    public function edit(Request $request): View
    {
        $user = Auth::user();
        $blogs = Blog::where('user_id', $user->id)->get();

        return view('backend.dashboard.UserProfile.editProfile', [
            'user' => $user,
            'blogs' => $blogs,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }
    public function show($id){
        $user= User::findOrFail($id);
        return view('backend.dashboard.UserProfile.editProfile')->with('user',$user);
    }

    /**
     * Delete the user's account.
     */

     public function updateProfile($id ,Request $request ){
        $user =User::where('id',$id)->update([
            "name"=>$request->name,
             "email"=>$request->email,
             "phone_number"=>$request->phone_number,

        ]);
        return redirect('/login');
    }
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
