<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // dd(Hash::make("admin@123"));

         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email , "password"=>$request->password])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('admin')->with('error','Somthing Went Wrong');
        }

    }

    public function store(Request $request)
    {

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@1123'),
        ]);

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin');
    }

    public function update_password()
    {

        return view('admin.include.change_password');

    }

    public function update(Request $request)
    {

        $request->validate([
            'current_password' => ['required'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols(),
            ],
        ]);

        $admin = auth('admin')->user();

        if (! $admin) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized access']);
        }
        if (! Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors([
                'current_password' => 'Current password does not match',
            ]);
        }
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()
            ->route('admin')
            ->with('status', 'Password changed successfully');
    }
}
