@extends('admin.include.layout')

@section('heading', 'Laundry')
@section('title', 'Edit Laundry Item')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">

    <h3 class="text-xl font-bold mb-6 text-center">Edit Laundry Item</h3>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('item.update',$laundry->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
     

        <div class="grid grid-cols-2 gap-4">

            {{-- Item Name --}}
            <div>
                <label class="block font-medium mb-1">Items Name *</label>
                <input type="text" name="name"
                    value="{{ old('name', $laundry->name) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
            </div>

            {{-- Pieces --}}
            <div>
                <label class="block font-medium mb-1">Items Pieces *</label>
                <input type="text" name="pices"
                    value="{{ old('pices', $laundry->pices) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
            </div>

            {{-- Type --}}
            <div>
                <label class="block font-medium mb-1">Items Type *</label>
                <input type="text" name="type_of_product"
                    value="{{ old('type_of_product', $laundry->type_of_product) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
            </div>

            {{-- Price --}}
            <div>
                <label class="block font-medium mb-1">Item Price</label>
                <input type="number" name="price"
                    value="{{ old('price', $laundry->price) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
            </div>

            {{-- Discount --}}
            <div>
                <label class="block font-medium mb-1">Discount (%)</label>
                <input type="number" name="discount"
                    value="{{ old('discount', $laundry->discount) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
            </div>

            {{-- Show Section --}}
            <div>
                <label class="block font-medium mb-1">Show Section *</label>
                <input type="text" name="show_section"
                    value="{{ old('show_section', $laundry->show_section) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
            </div>

            {{-- Category --}}
            <div class="col-span-2">
                <label class="block font-medium mb-1">Category *</label>
                <select name="category_id"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                    <option value="">Select Category</option>
                    @foreach (\App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $laundry->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Image --}}
            <div class="col-span-2">
                <label class="block font-medium mb-1">Item Image</label>
                <input type="file" name="images"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">

                @if ($laundry->images)
                    <img src="{{ asset($laundry->images) }}"
                         class="h-20 mt-2 rounded border">
                @endif
            </div>

            {{-- Button --}}
            <div class="col-span-2 flex gap-3">
                <button type="submit"
                    class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                    Update Item
                </button>

                <a href="{{ route('item.list') }}"
                   class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
                    Back
                </a>
            </div>

        </div>
    </form>

</div>
@endsection
