<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\WeightRange;
use Illuminate\Http\Request;

class WeightRangeController extends Controller
{
    public function index()
    {
        $data = WeightRange::all();
        return view('settings.weight_ranges.manage', compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'min_kg' => 'required|numeric',
            'max_kg' => 'nullable|numeric',
        ]);

        WeightRange::create([
            'min_kg' => $request->min_kg,
            'max_kg' => $request->max_kg,
        ]);

        return redirect()->route('weight.index')
            ->with('success', 'Data Created Successfully');
    }

    public function edit($id)
    {
        $editData = WeightRange::findOrFail($id);
        $data = WeightRange::all();

        return view('settings.weight_ranges.manage', compact('data', 'editData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'min_kg' => 'required|numeric',
            'max_kg' => 'nullable|numeric',
        ]);

        $weight = WeightRange::findOrFail($id);

        $weight->update([
            'min_kg' => $request->min_kg,
            'max_kg' => $request->max_kg,
        ]);

        return redirect()->route('weight.index')
            ->with('success', 'Data Updated Successfully');
    }

    public function delete($id)
    {
        WeightRange::findOrFail($id)->delete();

        return redirect()->route('weight.index')
            ->with('success', 'Data Deleted Successfully');
    }
}
