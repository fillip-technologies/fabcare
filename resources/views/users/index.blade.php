@extends('admin.include.layout')

@section('heading', 'Users')
@section('title', 'User Lists')

@section('content')

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

  <div class="max-w-7xl mx-auto mt-10">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- LEFT SIDE : USER FORM -->
        <div class="md:col-span-1 bg-white p-6 rounded-xl shadow-md">

            <h2 id="formTitle" class="text-xl font-bold mb-4">Add User</h2>

            <form  method="POST" action="{{ isset($editData) ? route('user.update',$editData->id) : route('user.save')}}">
                @csrf


                <div class="mb-4">
                    <label class="block mb-1 font-medium">Name</label>
                    <input type="text" name="name" value="{{ old('name',$editData->name ?? '') }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email',$editData->email ?? '') }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone',$editData->phone ?? '') }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Address</label>
                    <textarea name="address" id="address"
                        class="w-full border p-2 rounded">{{ old('address',$editData->address ?? "") }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded w-full">
                       {{ isset($editData) ? "Update User" : "Add User" }}
                    </button>


                </div>
            </form>
        </div>


        <!-- RIGHT SIDE : USER LIST -->
        <div class="md:col-span-2 bg-white p-6 rounded-xl shadow-md">

            <h2 class="text-xl font-bold mb-4">User List</h2>

            <table class="w-full border text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">#</th>
                        <th class="border px-3 py-2">Name</th>
                        <th class="border px-3 py-2">Email</th>
                        <th class="border px-3 py-2">Phone</th>
                        <th class="border px-3 py-2">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-3 py-2">{{ $user->name }}</td>
                            <td class="border px-3 py-2">{{ $user->email }}</td>
                            <td class="border px-3 py-2">{{ $user->phone }}</td>

                            <td class="border px-3 py-2">

                                <a href="{{ route('user.edit',$user->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded mx-2">
                                    Edit
                                </button>

                                <a href="{{ route('user.delete',$user->id) }}"
                                    class="bg-red-500 text-white px-3 py-1 rounded">
                                    Delete
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

    @endsection
