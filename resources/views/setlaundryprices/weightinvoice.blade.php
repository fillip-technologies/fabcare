@extends('admin.include.layout')

@section('heading', 'Laundry Billing')
@section('title', 'Add Laundry Bill')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 py-10">
<div class="max-w-6xl mx-auto">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Validation Error',
    html: `
        <ul style="text-align:center;">
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    `,
    showConfirmButton: true
});
</script>
@endif

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

<form action="{{ route('billing.store') }}" method="POST"
class="backdrop-blur-lg bg-white/80 p-10 rounded-2xl shadow-2xl border border-white/40">
@csrf

<h3 class="text-3xl font-extrabold mb-8 text-center bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
Laundry Billing Form
</h3>

<h4 class="text-lg font-semibold mb-6 text-gray-700 border-l-4 border-purple-500 pl-3">
User Details
</h4>

<div class="grid grid-cols-2 gap-6 mb-10">

<input type="text" name="customer_name" placeholder="Customer Name"
class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">

<input type="text" name="phone" placeholder="Phone Number"
class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">

<input type="email" name="email" placeholder="Email Address"
class="w-full px-4  border rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">

<textarea name="address" placeholder="Full Address"
class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm"></textarea>

</div>

{{-- ================= ITEMS DETAILS ================= --}}
<h4 class="text-lg font-semibold mb-6 text-gray-700 border-l-4 border-green-500 pl-3">
Items Details
</h4>

<div id="items-wrapper">

<div class="grid grid-cols-4 gap-6 mb-6 item-row bg-white p-4 rounded-xl shadow-md border">

<input type="text" name="item_name[]" placeholder="Item Name"
class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">

<input type="number" name="quantity[]" placeholder="Quantity"
class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">

<input type="number" name="price[]" placeholder="Price"
class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">

<button type="button"
class="remove-item bg-red-500 hover:bg-red-600 transition text-white rounded-lg px-4 shadow-md">
Remove
</button>

</div>

</div>

<button type="button" id="add-item"
class="mb-10 bg-green-500 hover:bg-green-600 transition text-white px-6 py-2 rounded-xl shadow-lg">
+ Add Item
</button>

{{-- ================= AMOUNT DETAILS ================= --}}
<h4 class="text-lg font-semibold mb-6 text-gray-700 border-l-4 border-blue-500 pl-3">
Amount Details
</h4>

<div class="grid grid-cols-4 gap-6 mb-10">

<input type="number" name="gst" placeholder="GST %"
class="px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400 shadow-sm">

<input type="number" name="discount" placeholder="Discount"
class="px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400 shadow-sm">

<input type="number" name="paid_amount" placeholder="Paid Amount"
class="px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400 shadow-sm">

</div>

<button type="submit"
class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:opacity-90 transition text-white py-4 rounded-xl text-lg font-semibold shadow-xl">
Generate Bill
</button>

</form>
</div>
</div>

{{-- ================= JAVASCRIPT ================= --}}
<script>

document.getElementById('add-item').addEventListener('click', function() {

let wrapper = document.getElementById('items-wrapper');

let newRow = document.createElement('div');
newRow.classList.add('grid','grid-cols-4','gap-6','mb-6','item-row','bg-white','p-4','rounded-xl','shadow-md','border');

newRow.innerHTML = `
<input type="text" name="item_name[]" placeholder="Item Name"
class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">

<input type="number" name="quantity[]" placeholder="Quantity"
class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">

<input type="number" name="price[]" placeholder="Price"
class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400">

<button type="button"
class="remove-item bg-red-500 hover:bg-red-600 transition text-white rounded-lg px-4 shadow-md">
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
