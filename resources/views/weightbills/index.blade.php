@extends('admin.include.layout')

@section('heading', 'Laundry Billing')
@section('title', 'Generate Bill')

@section('content')

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


    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-8">

            <form action="{{ route('store.weight.bill') }}" method="POST">
                @csrf

                <h2 class="text-xl font-bold mb-6 text-center">Customer Details</h2>

                <div class=" gap-4 mb-6">
                    <div>
                        <label class="font-semibold">User</label>
                        <select name="user_id" class="w-full border p-2 rounded-lg">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <h2 class="text-xl font-bold mb-6 text-center">Laundry Details</h2>

                <div class="grid grid-cols-2 gap-4 mb-6">

                    <div>
                        <label class="font-semibold">Weight (KG)</label>
                        <input type="number" step="0.01" name="weight" placeholder="Enter Weight"
                            class="w-full border p-2 rounded-lg">
                    </div>

                    <div>
                        <label class="font-semibold">Laundry Type</label>
                        <select name="laundry_type_id" class="w-full border p-2 rounded-lg">
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <h2 class="text-xl font-bold mb-6 text-center">Payment</h2>

                <div class="grid grid-cols-3 gap-4 mb-6">
                    <input type="number" step="0.01" name="gst_percent" placeholder="GST %"
                        class="border p-2 rounded-lg">
                    <input type="number" step="0.01" name="discount" placeholder="Discount"
                        class="border p-2 rounded-lg">
                    <input type="number" step="0.01" name="paid" placeholder="Paid Amount"
                        class="border p-2 rounded-lg">
                </div>

                <div class="text-center">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">
                        Generate Bill
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
