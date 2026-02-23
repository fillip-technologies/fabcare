<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\LaundryType;
use Illuminate\Http\Request;

class LaundryTypeController extends Controller
{
    public function index()
    {
        $types = LaundryType::latest()->get();

        return view('settings.laundry_types.manage', compact('types'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        LaundryType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('laundrytype.index')->with('success', 'Data Create SuccessFully');

    }

    public function edit($id)
    {
        $types = LaundryType::all();
        $editData = LaundryType::findOrFail($id);

        return view('settings.laundry_types.manage', compact('types', 'editData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $data = LaundryType::findOrFail($id);
        $data->update([
            'name' => $request->name,
        ]);

        return redirect()->route('laundrytype.index')->with('success', 'Data Updated SuccessFully');
    }

    public function delete($id)
    {
        LaundryType::findOrFail($id)->delete();
        return redirect()->route('laundrytype.index')->with('success', 'Data Deleted SuccessFully');
    }
}
