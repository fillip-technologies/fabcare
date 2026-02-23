<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaundryPrice;
use App\Models\LaundryType;
use App\Models\User;
use App\Models\WeightBillDetail;
use App\Models\WeightRange;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WeightBillController extends Controller
{
    public function list()
    {
        $billing = WeightBillDetail::with(['laundryType', 'weightRange', 'user'])->get();

        return view('weightbills.billinglist', compact('billing'));
    }

    public function create()
    {
        $ranges = WeightRange::all();
        $types = LaundryType::all();
        $users = User::where('name', '!=', 'Admin')->get();

        return view('weightbills.index', compact('ranges', 'types', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'laundry_type_id' => 'required|exists:laundry_types,id',
            'weight' => 'required|numeric|min:0.1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'gst_percent' => 'nullable|numeric|min:0|max:100',
            'paid' => 'nullable|numeric|min:0',
        ]);

        $userId = $request->user_id;
        $typeId = $request->laundry_type_id;
        $weight = $request->weight;
        $paid = $request->paid ?? 0;
        $gstPercent = $request->gst_percent ?? 0;
        $discountPercent = $request->discount ?? 0;

        $invoiceNumber = 'FBC-'.strtoupper(Str::random(6));
        $laundryNumber = 'LND-'.strtoupper(Str::random(6));

        $range = WeightRange::where('min_kg', '<=', $weight)
            ->where(function ($q) use ($weight) {
                $q->where('max_kg', '>=', $weight)
                    ->orWhereNull('max_kg');
            })
            ->first();

        if (! $range) {
            return back()->withErrors([
                'weight' => 'No price range found for this weight',
            ]);
        }

        $price = LaundryPrice::where('weight_range_id', $range->id)
            ->where('laundry_type_id', $typeId)
            ->value('price');

        if (! $price) {
            return back()->withErrors([
                'laundry_type_id' => 'Price not set for selected type & weight range',
            ]);
        }

        $subtotal = $weight * $price;

        $totalOrders = WeightBillDetail::where('user_id', $userId)->count();
        if ($totalOrders == 3) {
            $discountPercent = 10;
        }

        $discountAmount = ($subtotal * $discountPercent) / 100;

        $afterDiscount = $subtotal - $discountAmount;

        $gstAmount = ($afterDiscount * $gstPercent) / 100;

        $finalAmount = $afterDiscount + $gstAmount;

        $due = $finalAmount - $paid;

        $bill = WeightBillDetail::create([
            'user_id' => $userId,
            'invoice_number' => $invoiceNumber,
            'laundry_number' => $laundryNumber,
            'laundry_type_id' => $typeId,
            'weight_range_id' => $range->id,
            'weight' => $weight,
            'rate' => $price,
            'total' => $subtotal,
            'discount' => $discountPercent,
            'gst_percent' => $gstPercent,
            'gst_amount' => $gstAmount,
            'paid' => $paid,
            'due' => $due,
        ]);

        $bill->load(['laundryType', 'weightRange', 'user']);

        // Generate PDF
        $pdf = Pdf::loadView('weightbills.invoice', [
            'billing' => $bill,
        ]);

        return $pdf->download('Weightbill-'.$bill->invoice_number.'.pdf');
    }
}
