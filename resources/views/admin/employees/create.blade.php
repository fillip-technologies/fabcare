@extends('admin.include.layout')
@section('heading', 'Employees')
@section('title', 'Add Employees')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">

        <div class="bg-white shadow-xl rounded-xl p-8">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Employees

            </h2>

            {{-- SweetAlert --}}
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

            {{-- Form --}}
            <form action="{{ route('add.employees') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Row 1 --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2"
                            placeholder="Enter your name">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border rounded-lg p-2" placeholder="Enter your email">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Row 2 --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="w-full border rounded-lg p-2" maxlength="12" placeholder="Enter phone number"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,12)">
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" class="w-full border rounded-lg p-2"
                            placeholder="Enter password">
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Row 3 --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Role</label>
                        <select name="role_id" id="" class="w-full border rounded-lg p-2">
                            <option value="0" selected>Select Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Client</option>
                        </select>
                        @error('role')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}"
                            class="w-full border rounded-lg p-2" placeholder="Enter address">
                        @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                      <div>
                        <label class="block font-medium text-gray-700 mb-2">Domain</label>
                        <input type="text" name="domain" value="{{ old('domain') }}"
                            class="w-full border rounded-lg p-2" placeholder="Enter your domain">
                        @error('domain')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-700 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold">
                        Save Users
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
