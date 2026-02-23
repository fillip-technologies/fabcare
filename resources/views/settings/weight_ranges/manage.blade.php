@extends('admin.include.layout')

@section('heading', 'Add Weight Range')
@section('title', 'Add Weight Range')

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


            <div class="bg-white p-6 rounded-xl shadow mb-8">

                <h2 class="text-xl font-bold mb-4 text-gray-700">
                   {{ isset($editData) ? "Edit Weight Range" : "Add Weight Range" }}
                </h2>

                <form action="{{ isset($editData) ? route('weight.update',$editData->id) : route('weight.save') }}"
                    method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1">Minimum KG</label>
                            <input type="number" step="0.1" name="min_kg"
                                value="{{ old('min_kg', $editData->min_kg ?? "") }}" class="w-full border rounded px-3 py-2"
                                required>
                        </div>

                        <div>
                            <label class="block mb-1">Maximum KG (Blank = Unlimited)</label>
                            <input type="number" step="0.1" name="max_kg"
                            value="{{ old('max_kg',$editData->max_kg ?? "") }}"
                                class="w-full border rounded px-3 py-2">
                        </div>
                    </div>

                    <button class="mt-4 bg-green-500 px-6 py-2 rounded text-white">
                          {{ isset($editData) ? "Update" : "Add" }}
                    </button>
                </form>
            </div>



            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold mb-4 text-gray-700">Weight Range List</h2>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Min KG</th>
                            <th class="border px-4 py-2">Max KG</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $key=> $d)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 p-y2">{{ $d->min_kg }}</td>
                                <td class="border px-4 p-y2">{{ $d->max_kg }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('weight.edit', $d->id) }}"
                                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                            Edit
                                        </a>

                                        <form action="{{ route('weight.delete', $d->id) }}" method="POST"
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
                        @endforelse

                    </tbody>
                </table>

            </div>

        </div>
    </div>

@endsection
