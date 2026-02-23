<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('user.index')->with('success', 'User Created SuccessFully');
    }

    public function edit($id)
    {
        $editData = User::findOrFail($id);
        $users = User::paginate(10);

        return view('users.index', compact('editData','users'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
        ]);
        $data = User::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('user.index')->with('success', 'User Updated SuccessFully');

    }

    public function delete($id)
    {
            User::findOrFail($id)->delete();
            return redirect()->route('user.index')->with('success', 'User Deleted SuccessFully');

    }
}
