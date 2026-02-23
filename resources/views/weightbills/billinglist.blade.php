@extends('admin.include.layout')

@section('heading', 'Laundry Billing')
@section('title', 'Bill Listing')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 py-10">
        <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-2xl p-8">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-700">
                    All Generated Bills
                </h2>

                <a href="{{ route('weight.bill.form') }}"
                    class="bg-purple-700 hover:bg-purple-600 text-white px-5 py-2 rounded-lg font-semibold">
                    + Create Invoice
                </a>
            </div>

            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100 text-center">
                    <tr>
                        <th class="p-3 border">#</th>
                        <th class="p-3 border">Customer</th>
                        <th class="p-3 border">Phone</th>
                        <th class="p-3 border">Weight</th>
                        <th class="p-3 border">Laundry Type</th>
                        <th class="p-3 border">Total</th>
                        <th class="p-3 border">Paid</th>
                        <th class="p-3 border">Due</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($billing as $key=> $bill)
                        <tr>
                            <td class="p-3 border">{{ $key + 1 }}</td>
                            <td class="p-3 border">{{ $bill->user->name }}</td>
                            <td class="p-3 border">{{ $bill->user->phone }}</td>
                            <td class="p-3 border">
                                {{ $bill->weightRange->min_kg }} -
                                {{ $bill->weightRange->max_kg }}
                            </td>
                            <td class="p-3 border">
                                {{ $bill->laundryType->name }}
                            </td>
                            <td class="p-3 border"><span class="font-bold text-green-600">₹{{ $bill->total }}.00</span></td>
                            <td class="p-3 border"><span class="font-bold text-blue-600">₹{{ $bill->paid }}.00</span></td>
                            <td class="p-3 border"><span class="font-bold text-red-600">₹{{ $bill->due }}.00</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">No Found Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

@endsection
