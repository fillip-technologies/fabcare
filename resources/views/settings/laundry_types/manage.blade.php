@extends('admin.include.layout')

@section('heading', 'Laundry Type')
@section('title', 'Laundry Type')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 py-10">
        <div class="max-w-7xl mx-auto">

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            {{-- Alerts --}}
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold mb-4 text-gray-700">
                        {{ isset($editData) ? 'Edit Laundry Type' : 'Add Laundry Type' }}
                    </h2>

                    <form
                        action="{{ isset($editData) ? route('laundrytype.update', $editData->id) : route('laundrytype.save') }}"
                        method="POST">
                        @csrf

                        <div>
                            <label class="block mb-1 font-medium">Laundry Type Name</label>
                            <input type="text" name="name"
                                class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-purple-400"
                                value="{{ old('name', $editData->name ?? '') }}" placeholder="Enter laundry type" required>
                        </div>

                        <button class="mt-4 bg-purple-500 hover:bg-purple-600 text-white px-6 py-2 rounded">
                            {{ isset($editData) ? 'Update Type' : 'Save Type' }}
                        </button>
                    </form>
                </div>


                {{-- RIGHT SIDE - LISTING --}}
                <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold mb-4 text-gray-700">
                        Laundry Type List
                    </h2>

                    <table class="w-full border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">Type Name</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $key => $d)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>

                                    <td class="border px-4 py-2">
                                        {{ $d->name }}
                                    </td>

                                    <td class="border px-4 py-2 text-center">
                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('laundrytype.edit',$d->id) }}"
                                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                                Edit
                                            </a>

                                            <form action="{{ route('laundrytype.edit',$d->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">
                                        No Data Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

@endsection
