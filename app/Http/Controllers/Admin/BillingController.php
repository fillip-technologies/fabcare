<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillingItesm;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BillingController extends Controller
{
    public function billform()
    {
        $users = User::where('name', '!=', 'Admin')->get();

        return view('billings.index', compact('users'));
    }

    public function billcreate(Request $request)
    {
        $request->validate([
            'item_name' => 'required|array|min:1',
            'item_name.*' => 'required|string|max:255',
            'quantity' => 'required|array',
            'quantity.*' => 'required|numeric|min:1',

            'price' => 'required|array',
            'price.*' => 'required|numeric|min:0',

            'gst' => 'required|numeric|min:0|max:100',
            'discount' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
        ]);
        $invoiceNumber = 'FBC'.'-'.strtoupper(Str::random(6));

        $uid = $request->user_id;
        $items = [];
        $subtotal = 0;

        foreach ($request->item_name as $key => $item) {

            $qty = $request->quantity[$key];
            $price = $request->price[$key];
            $total = $qty * $price;

            $subtotal += $total;

            $items[] = [
                'item_name' => $item,
                'quantity' => $qty,
                'price' => $price,
                'total' => $total,
            ];
        }

        $gstAmount = ($subtotal * $request->gst) / 100;
        $discount = $request->discount ?? 0;
        $grandTotal = $subtotal + $gstAmount - $discount;
        $dueAmount = $grandTotal - $request->paid_amount;


        $laundryNumber = 'LNDNO'.'-'.strtoupper(Str::random(6));

        $billing = BillingItesm::create([
            'user_id' => $uid,
            'itemsdata' => $items,
            'gst' => $gstAmount,
            'discount' => $discount,
            'total_amount' => $grandTotal,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $dueAmount > 0 ? $dueAmount : 0,
            'invoice_number' => $invoiceNumber,
            'laundry_number' => $laundryNumber,
        ]);

        $pdf = Pdf::loadView('billings.invoice', [
            'billing' => $billing,
            'items' => $items,
            'subtotal' => $subtotal,
        ]);

        return $pdf->download('Invoice-'.$billing->id.'.pdf');

    }

    public function billlist()
    {
        $datas = BillingItesm::with('user')->get();

        return view('billings.billinglist', compact('datas'));
    }

    // public function billedit($id)
    // {
    //     $data = BillingItesm::with('user')->findOrFail($id);

    //     return view('billings.editbill', compact('data'));
    // }

    // public function billupdate(Request $request, $id)
    // {
    //     $request->validate([
    //         'customer_name' => 'required|string|max:255',
    //         'phone' => 'required|digits_between:10,15',
    //         'email' => 'required|email|max:255',
    //         'address' => 'required|string|max:500',

    //         'item_name' => 'required|array|min:1',
    //         'item_name.*' => 'required|string|max:255',

    //         'quantity' => 'required|array',
    //         'quantity.*' => 'required|numeric|min:1',

    //         'price' => 'required|array',
    //         'price.*' => 'required|numeric|min:0',

    //         'gst' => 'required|numeric|min:0|max:100',
    //         'discount' => 'nullable|numeric|min:0',
    //         'paid_amount' => 'required|numeric|min:0',
    //     ]);

    //     $billing = BillingItesm::findOrFail($id);

    //     $user = $billing->user;
    //     $user->update([
    //         'name' => $request->customer_name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'address' => $request->address,
    //     ]);

    //     $items = [];
    //     $subtotal = 0;

    //     foreach ($request->item_name as $key => $item) {

    //         $qty = $request->quantity[$key];
    //         $price = $request->price[$key];
    //         $total = $qty * $price;

    //         $subtotal += $total;

    //         $items[] = [
    //             'item_name' => $item,
    //             'quantity' => $qty,
    //             'price' => $price,
    //             'total' => $total,
    //         ];
    //     }

    //     $gstAmount = ($subtotal * $request->gst) / 100;
    //     $discount = $request->discount ?? 0;
    //     $grandTotal = $subtotal + $gstAmount - $discount;
    //     $dueAmount = $grandTotal - $request->paid_amount;

    //     $billing->update([
    //         'itemsdata' => $items,
    //         'gst' => $gstAmount,
    //         'discount' => $discount,
    //         'total_amount' => $grandTotal,
    //         'paid_amount' => $request->paid_amount,
    //         'due_amount' => $dueAmount > 0 ? $dueAmount : 0,
    //     ]);

    //     $pdf = Pdf::loadView('billings.invoice', [
    //         'billing' => $billing,
    //         'user' => $user,
    //         'items' => $items,
    //         'subtotal' => $subtotal,
    //     ]);

    //     return $pdf->download('Invoice-'.$billing->invoice_number.'.pdf');

    //     return redirect()->route('billing.list')->with('success', 'Billing Updated successfully!');
    // }

    // public function billdelete($id)
    // {
    //     BillingItesm::findOrFail($id)->delete();

    //     return redirect()->route('billing.list')->with('success', 'Billing Deleted successfully!');

    // }
}
