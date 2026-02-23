@extends('admin.include.layout')

@section('heading', 'Billing')
@section('title', 'Invoice List')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif

<div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Invoice List</h2>

        <a href="{{ route('billing.from') }}"
           class="bg-purple-700 hover:bg-purple-600 text-white px-5 py-2 rounded-lg font-semibold">
            + Create Invoice
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 text-sm">
            <thead class="bg-gray-100 text-center">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Invoice</th>
                      <th class="border px-4 py-2">Laundary Number</th>
                    <th class="border px-4 py-2">Customer</th>
                    <th class="border px-4 py-2">Items</th>
                    <th class="border px-4 py-2">Total</th>
                    <th class="border px-4 py-2">GST</th>
                    <th class="border px-4 py-2">Discount</th>
                    <th class="border px-4 py-2">Paid</th>
                    <th class="border px-4 py-2">Due</th>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($datas as $key => $bill)
                <tr class="hover:bg-gray-50 align-top text-center">

                    <td class="border px-4 py-2">{{ $key + 1 }}</td>

                    <td class="border px-4 py-2 font-semibold">
                        {{ $bill->invoice_number }}
                    </td>
                      <td class="border px-4 py-2 font-semibold">
                        {{ $bill->laundry_number }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $bill->user->name ?? 'N/A' }}
                    </td>

                    <!-- ITEMS COLUMN -->
                    <td class="border px-4 py-2 text-left">

                        @if(!empty($bill->itemsdata))
                            <ul class="space-y-2">
                                @foreach($bill->itemsdata as $item)
                                    <li class="bg-gray-100 p-2 rounded-md text-xs shadow-sm">
                                        <strong>{{ $item['item_name'] }}</strong><br>

                                        Qty: {{ $item['quantity'] }} |
                                        ₹{{ $item['price'] }} × {{ $item['quantity'] }}
                                        =

                                        <span class="font-semibold text-green-600">
                                            ₹{{ $item['total'] }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            -
                        @endif

                    </td>

                    <td class="border px-4 py-2 font-bold text-green-600">
                        ₹ {{ number_format($bill->total_amount, 2) }}
                    </td>

                    <td class="border px-4 py-2">
                        ₹ {{ number_format($bill->gst, 2) }}
                    </td>

                    <td class="border px-4 py-2">
                        ₹ {{ number_format($bill->discount ?? 0, 2) }}
                    </td>

                    <td class="border px-4 py-2 text-blue-600">
                        ₹ {{ number_format($bill->paid_amount, 2) }}
                    </td>

                    <td class="border px-4 py-2">
                        @if($bill->due_amount > 0)
                            <span class="text-red-600 font-semibold">
                                ₹ {{ number_format($bill->due_amount, 2) }}
                            </span>
                        @else
                            <span class="text-green-600 font-semibold">
                                Paid
                            </span>
                        @endif
                    </td>

                    <td class="border px-4 py-2">
                        {{ $bill->created_at->format('d M Y') }}
                    </td>

                    <td class="border px-4 py-2">
                        <div class="flex flex-col gap-2">

                            <a href="{{ route('billing.edit',$bill->id) }}"
                               class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-xs">
                                Edit
                            </a>

                            <form action="{{ route('billing.delete',$bill->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs w-full">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="11" class="text-center py-6 text-gray-500">
                        No Invoices Found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
