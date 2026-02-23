<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\LaundryPrice;
use App\Models\LaundryType;
use App\Models\WeightRange;
use Illuminate\Http\Request;

class LaundryPriceController extends Controller
{
    public function index()
    {
        $ranges = WeightRange::all();
        $types = LaundryType::all();
        $prices = LaundryPrice::with(['weightRange', 'laundryType'])->paginate(6);

        return view('settings.laundry_prices.manage', compact('ranges', 'types', 'prices'));
    }

    public function edit($id)
    {
        $editPrice = LaundryPrice::findOrFail($id);
        $ranges = WeightRange::all();
        $types = LaundryType::all();
        $prices = LaundryPrice::with(['weightRange', 'laundryType'])->paginate(6);

        return view('settings.laundry_prices.manage', compact('ranges', 'types', 'prices', 'editPrice'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'weight_range_id' => 'required',
            'laundry_type_id' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $exists = LaundryPrice::where('weight_range_id', $request->weight_range_id)
            ->where('laundry_type_id', $request->laundry_type_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['This price already exists for selected range & type']);
        }

        LaundryPrice::create([
            'weight_range_id' => $request->weight_range_id,
            'laundry_type_id' => $request->laundry_type_id,
            'price' => $request->price,
        ]);

        return redirect()->route('price.index')->with('success', 'Price Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'weight_range_id' => 'required',
            'laundry_type_id' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $price = LaundryPrice::findOrFail($id);

        $exists = LaundryPrice::where('weight_range_id', $request->weight_range_id)
            ->where('laundry_type_id', $request->laundry_type_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['This price already exists for selected range & type']);
        }

        $price->update([
            'weight_range_id' => $request->weight_range_id,
            'laundry_type_id' => $request->laundry_type_id,
            'price' => $request->price,
        ]);

        return redirect()->route('price.index')->with('success', 'Price Updated Successfully');
    }

    public function delete($id)
    {
        $price = LaundryPrice::findOrFail($id);
        $price->delete();

        return redirect()->route('price.index')->with('success', 'Price Deleted Successfully');
    }
}
