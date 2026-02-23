@extends('admin.include.layout')

@section('heading', 'Laundry Billing')
@section('title', 'Add Laundry Bill')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow">

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">
            Laundry Billing Form
        </h2>

        <form action="{{ route('billing.store') }}" method="POST">
            @csrf

       
            <h4 class="text-lg font-semibold mb-4 border-b pb-2">Customer Details</h4>

            <div class="mb-6">
                <label class="block mb-2 font-medium">Select Customer</label>
                <select name="user_id" class="w-full border px-3 py-2 rounded">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Items Section --}}
            <h4 class="text-lg font-semibold mb-4 border-b pb-2">Items Details</h4>

            <div id="items-wrapper">

                <div class="grid grid-cols-4 gap-4 mb-4 item-row">
                    <input type="text" name="item_name[]" placeholder="Item Name"
                        class="border px-3 py-2 rounded">

                    <input type="number" name="quantity[]" placeholder="Quantity"
                        class="border px-3 py-2 rounded">

                    <input type="number" name="price[]" placeholder="Price"
                        class="border px-3 py-2 rounded">

                    <button type="button"
                        class="remove-item bg-red-500 text-white px-3 rounded">
                        Remove
                    </button>
                </div>

            </div>

            <button type="button" id="add-item"
                class="mb-6 bg-green-500 text-white px-4 py-2 rounded">
                + Add Item
            </button>

            {{-- Amount Section --}}
            <h4 class="text-lg font-semibold mb-4 border-b pb-2">Amount Details</h4>

            <div class="grid grid-cols-3 gap-4 mb-6">
                <input type="number" name="gst" placeholder="GST %"
                    class="border px-3 py-2 rounded">

                <input type="number" name="discount" placeholder="Discount"
                    class="border px-3 py-2 rounded">

                <input type="number" name="paid_amount" placeholder="Paid Amount"
                    class="border px-3 py-2 rounded">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded font-semibold">
                Generate Bill
            </button>

        </form>
    </div>
</div>

{{-- JS --}}
<script>
    document.getElementById('add-item').addEventListener('click', function() {

        let wrapper = document.getElementById('items-wrapper');

        let newRow = document.createElement('div');
        newRow.classList.add('grid','grid-cols-4','gap-4','mb-4','item-row');

        newRow.innerHTML = `
            <input type="text" name="item_name[]" placeholder="Item Name"
                class="border px-3 py-2 rounded">

            <input type="number" name="quantity[]" placeholder="Quantity"
                class="border px-3 py-2 rounded">

            <input type="number" name="price[]" placeholder="Price"
                class="border px-3 py-2 rounded">

            <button type="button"
                class="remove-item bg-red-500 text-white px-3 rounded">
                Remove
            </button>
        `;

        wrapper.appendChild(newRow);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.item-row').remove();
        }
    });
</script>

@endsection
