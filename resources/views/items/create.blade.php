@extends('admin.include.layout')

@section('heading', 'Laundry')
@section('title', 'Add Laundry')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">

        {{-- SweetAlert CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Validation Errors --}}
        {{-- SweetAlert CDN --}}
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
                    showConfirmButton: true
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


        {{-- Staff Registration Form --}}
        <form action="{{ route('item.save') }}" method="POST" class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md"
            enctype="multipart/form-data">
            @csrf

            <h3 class="text-xl font-bold mb-6 text-center">Add Laundry</h3>

            <div class="grid grid-cols-2 gap-4">

                {{-- Item Name --}}
                <div>
                    <label class="block font-medium mb-1">Items Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                {{-- Item Pieces --}}
                <div>
                    <label class="block font-medium mb-1">Items Pieces *</label>
                    <input type="text" name="pices" value="{{ old('pices') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                {{-- Item Type --}}
                <div>
                    <label class="block font-medium mb-1">Items Type *</label>
                    <input type="text" name="type_of_product" value="{{ old('type_of_product') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                {{-- Price --}}
                <div>
                    <label class="block font-medium mb-1">Item Price</label>
                    <input type="number" name="price" value="{{ old('price') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                {{-- Discount --}}
                <div>
                    <label class="block font-medium mb-1">Discount</label>
                    <input type="number" name="discount" value="{{ old('discount') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                {{-- Show Section --}}
                <div>
                    <label class="block font-medium mb-1">Show Section *</label>
                    <input type="text" name="show_section" value="{{ old('show_section') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                {{-- Category (full width) --}}
                <div class="col-span-2">
                    <label class="block font-medium mb-1">Categories *</label>
                    <select name="category_id"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                        <option value="">Select Category</option>
                        @foreach (\App\Models\Category::all() as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Image (full width) --}}
                <div class="col-span-2">
                    <label class="block font-medium mb-1">Item Image</label>
                    <input type="file" name="images"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                {{-- Button (full width) --}}
                <div class="col-span-2">
                    <button type="submit"
                        class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition">
                        Add Items
                    </button>
                </div>

            </div>
        </form>



    </div>
@endsection
