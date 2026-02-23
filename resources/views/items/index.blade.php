@extends('admin.include.layout')

@section('heading', 'Laundry')
@section('title', 'Laundry List')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: `{!! implode('<br>', $errors->all()) !!}`
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
    <div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Laundry Items List</h2>

            <div class="flex gap-2">
                <form method="GET" action="{{ route('items.search') }}" class="flex gap-2">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by Categories name......."
                        class="w-72 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">

                    <button type="submit"
                        class="bg-purple-700 text-white px-5 py-2 rounded-lg hover:bg-purple-600 transition">
                        Search
                    </button>

                </form>
                <a href="{{ route('export.items') }}"
                    class="inline-block bg-green-700 hover:bg-green-600
                  text-white px-5 py-2 rounded-lg font-semibold">
                    Exports
                </a>
                <a href="{{ route('items.index') }}"
                    class="inline-block bg-purple-700 hover:bg-purple-600
                  text-white px-5 py-2 rounded-lg font-semibold">
                    + Add
                </a>
                <button type="button" onclick="openImportModal()"
                    class="bg-pink-700 hover:bg-pink-600 text-white px-5 py-2 rounded-lg font-semibold">
                    Import
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Item Name</th>
                        <th class="border px-4 py-2">Pieces</th>
                        <th class="border px-4 py-2">Type</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Discount</th>
                        <th class="border px-4 py-2">Original-Price</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Image</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($laundries as $key => $item)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $key + 1 }}</td>
                            <td class="border px-4 py-2 font-medium">{{ $item->name }}</td>
                            <td class="border px-4 py-2">{{ $item->pices }}</td>
                            <td class="border px-4 py-2">{{ $item->type_of_product }}</td>
                            <td class="border px-4 py-2">₹ {{ $item->price }}</td>
                            <td class="border px-4 py-2">{{ $item->discount ?? 0 }}%</td>
                            <td class="border px-4 py-2">₹{{ $item->original_price }}</td>
                            <td class="border px-4 py-2">
                                {{ $item->category->name ?? '-' }}
                            </td>

                            <td class="border px-4 py-2">
                                @if ($item->images)
                                    <img src="{{ asset($item->images) }}" class="h-12 w-12 mx-auto rounded">
                                @else
                                    -
                                @endif
                            </td>

                            <td class="border px-4 py-2">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('items.edit', $item->id) }}"
                                        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('item.delete', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-6 text-gray-500">
                                No Laundry Items Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <!-- Import Modal -->
    <div id="importModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-xl relative">

            <!-- Close Button -->
            <button onclick="closeImportModal()" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-xl">
                ✕
            </button>

            <h2 class="text-xl font-bold mb-4 text-center">Import Laundry Items</h2>

            <form action="{{ route('import.items') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Select Excel File</label>
                    <input type="file" name="file" class="w-full border rounded-lg p-2" accept=".xlsx,.xls,.csv"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-green-700 hover:bg-green-600 text-white py-2 rounded-lg font-semibold">
                    Upload
                </button>
            </form>

        </div>
    </div>

    <script>
        function openImportModal() {
            document.getElementById('importModal').classList.remove('hidden');
            document.getElementById('importModal').classList.add('flex');
        }

        function closeImportModal() {
            document.getElementById('importModal').classList.add('hidden');
            document.getElementById('importModal').classList.remove('flex');
        }
    </script>


@endsection
