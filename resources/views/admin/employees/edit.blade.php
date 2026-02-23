@extends('admin.include.layout')
@section('heading', 'Employees')
@section('title', 'Add Employees ')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">

        <div class="bg-white shadow-xl rounded-xl p-8">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Employees

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
            <form action="{{ route('update.employees', $user->id) }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Name</label>

                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full border rounded-lg p-2">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Email</label>

                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full border rounded-lg p-2">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Phone</label>
                        <input type="number" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full border rounded-lg p-2" maxlength="12" placeholder="Enter phone number"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,12)">
                        @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>



                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Role</label>
                        <select name="role_id" id="" class="w-full border rounded-lg p-2">
                            <option value="0" selected>Select Role</option>
                            <option value="1" {{ old('role_id', $user->role_id === 1 ? 'selected' : "") }}>Admin</option>
                            <option value="2" {{ old('role_id' , $user->role_id === 2 ? "selected" : "") }}>Client</option>
                        </select>
                        @error('role')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Status</label>

                        <select name="status" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">

                            <option value="">-- Select Status --</option>
                            <option value="Active" {{ old('status', $user->status) == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive" {{ old('status', $user->status) == 'Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                        @error('status')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Address</label>
                        <input type="text" name="address" value="{{ old('address', $user->address) }}"
                            class="w-full border rounded-lg p-2">
                        @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-2">Domain</label>
                        <input type="text" name="domain" value="{{ old('domain', $user->domain) }}"
                            class="w-full border rounded-lg p-2" placeholder="Enter your domain">
                        @error('domain')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-700 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold">
                        Update Users
                    </button>
                </div>

            </form>
        </div>
    </div>



@endsection
