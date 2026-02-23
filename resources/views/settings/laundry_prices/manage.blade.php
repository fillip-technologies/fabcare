@extends('admin.include.layout')

@section('heading', 'Laundry Billing')
@section('title', 'Add Laundry Bill')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 py-10">
    <div class="max-w-6xl mx-auto">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Validation Errors --}}
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
                });
            </script>
        @endif

        {{-- Success Message --}}
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


        {{-- ================= ADD / EDIT FORM ================= --}}
        <div class="bg-white p-6 rounded-xl shadow mb-8">
            <h2 class="text-xl font-bold mb-4 text-gray-700">
                {{ isset($editPrice) ? 'Edit Price' : 'Set Price' }}
            </h2>

            <form action="{{ isset($eidPrice) ? route('price.update',$editPrice->id) : route('price.save') }}" method="POST">
                @csrf

                <div class="grid grid-cols-3 gap-4">

                    <div>
                        <label class="block mb-1">Select Weight Range</label>
                        <select name="weight_range_id" class="w-full border rounded px-3 py-2" required>
                            @foreach($ranges as $range)
                                <option value="{{ $range->id }}"
                                    {{ isset($editPrice) && $editPrice->weight_range_id == $range->id ? 'selected' : '' }}>
                                    {{ $range->min_kg }} -
                                    {{ $range->max_kg ?? 'Above' }} KG
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1">Select Laundry Type</label>
                        <select name="laundry_type_id" class="w-full border rounded px-3 py-2" required>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ isset($editPrice) && $editPrice->laundry_type_id == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1">Price</label>
                        <input type="number" step="0.01" name="price"
                               value="{{ $editPrice->price ?? '' }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                </div>

                <button class="mt-4 {{ isset($editPrice) ? 'bg-blue-600' : 'bg-green-500' }} text-white px-6 py-2 rounded">
                    {{ isset($editPrice) ? 'Update Price' : 'Save Price' }}
                </button>
            </form>
        </div>


        {{-- ================= PRICE LIST ================= --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-4 text-gray-700">Price List</h2>

            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Weight Range</th>
                        <th class="border px-4 py-2">Laundry Type</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prices as $key => $price)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $key+1 }}</td>
                            <td class="border px-4 py-2">
                                {{ $price->weightRange->min_kg }} -
                                {{ $price->weightRange->max_kg ?? 'Above' }} KG
                            </td>
                            <td class="border px-4 py-2">
                                {{ $price->laundryType->name }}
                            </td>
                            <td class="border px-4 py-2">
                                ₹ {{ $price->price }}
                            </td>
                            <td class="border px-4 py-2 space-x-2">

                                {{-- Edit --}}
                                <a href="{{ route('price.edit',$price->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                                   Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('price.delete',$price->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Delete this price?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                No Price Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
<div class="mt-3">
    {{ $prices->links() }}
</div>
    </div>
</div>

@endsection
