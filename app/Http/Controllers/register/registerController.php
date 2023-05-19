<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class registerController extends Controller
{
    //
    public function register()
    {
        # code...
        return view('frontend.login.register');
    }

    public function registeruser(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'name' => 'required',
            'cpassword' => 'required_with:password|same:password|min:6'
        ]);
       $myemail= strtolower($req->email);
        $register=new User;
        $register->name=$req->name;
        $register->email= $myemail;
        //$register->password=Hash::make("password");
        $register->password = Hash::make($req->password);
        $register->save();
        return redirect()->route("login");
    }
    public function login()
    {
        return view("frontend.login.login");
    }

    public function loginuser(Request $req)
    {

        $validated = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $myemail = strtolower($req->email);
        $user=Auth::attempt(['email' => $myemail, 'password' => $req->password, 'isAdmin' => 0]);
        $admin = Auth::attempt(['email' => $myemail, 'password' => $req->password, 'isAdmin' => 1]);

        if($user) {
            $req->session()->put('user', $user);
            $req->session()->regenerateToken();
            return redirect('/');

            // The user is active, not suspended, and exists.

        }

        if ($admin){
            $req->session()->put('admin', $user);
            return redirect()->route('adminindex');
        }
        return redirect()->back()->with('status', "Invalid Username or password");
    }
    public function logout(Request $req)
    {

        // $user = Session::get('user')['id'];

        // $admin = Session::get('admin')['id'];

            Auth::logout();
            $req->session()->invalidate();
            return redirect('/');

        // $req->session()->regenerateToken();

    }
}
