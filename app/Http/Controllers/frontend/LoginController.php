<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('frontend.layouts.login');
    }
    public function login(Request $request){
        $request->validate([
            "email"=> "required|email:rfc,dns |string |max:255",
            "password"=> "required|min:8",
        ]);
        $credentials= $request->only("email","password");

        if(Auth::attempt($credentials) &&  $request->user()->user_type_id==1){
            $request->session()->regenerate();
            return redirect("/Back-end/dashboard");
            }
        elseif(Auth::attempt($credentials) &&  $request->user()->user_type_id==2){
            $request->session()->regenerate();
            return redirect("/");
        }else{
            return redirect("/");
        }
        }

public function logout(){
    Auth::logout();
    return redirect("/");
}

public function register(Request $request){

    $request->validate([
        "name"=>"required|string|max:100",
        "email"=> "required|email:rfc,dns |string |max:255",
        "password"=> "required|min:8",
        "password2" => "required|same:password",
        "phone"=>"required|min:10|string",
        "profile_pic" => 'max:2048|mimes:jpg,png,gif',
    ]);

    $path = null;
    if ($request->hasFile('profile_pic')) {
        $path = $request->file('profile_pic')->store('profile_pics', 'public');
    }
    $user= User::create([
        "name"=>$request->name,
        "password"=>Hash::make($request->password),
        "email"=>$request->email,
        "phone"=>$request->phone,
        "profile_pic"=>$path,
        "user_type_id"=>2,
    ]
    );
    
    // $request->session()->flash('success', 'Registration successful! you can now login from the login page.');
    // return back();

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Successful login
        return redirect('/')->with('success', 'Welcome, ' . $user->name . '! You are now logged in.');
    } else {
        // Login failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    }

    public function profile($id){
        $user = User::findOrFail($id);
    
        return view('frontend.layouts.profile')->with('user',$user);
    }
    
    public function edit($id){
        $user = User::findOrFail($id);
        return view('frontend.layouts.edit')->with('user',$user);;
    
    
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'.$user->id,
            'phone' => 'required|string|max:20',
        ]);
    
        $user->update($validatedData);
        return redirect()->route('front-end.profile',$user->id);
    }


}