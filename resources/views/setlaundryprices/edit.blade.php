@extends('admin.include.layout')

@section('heading', 'Set Laundry Weight')
@section('title', 'Add Laundry Weight')

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


        <form action="{{ route('set.save') }}" method="POST" class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
            @csrf
            <h3 class="text-xl font-bold mb-6 text-center">Set Laudary Weight</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <div>
                    <label class="block font-medium mb-1">Weigth *</label>
                    <input type="text" name="weight" value="{{ old('weight') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                <div>
                    <label class="block font-medium mb-1">Laundry Type *</label>
                    <select name="launtrytype"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">

                        <option value="">-- Select Laundry Type --</option>

                        <option value="Regular Laundry" {{ old('launtrytype') == 'Regular Laundry' ? 'selected' : '' }}>
                            Regular Laundry
                        </option>

                        <option value="Express Laundry" {{ old('launtrytype') == 'Express Laundry' ? 'selected' : '' }}>
                            Express Laundry
                        </option>

                        <option value="Cuff & Collar" {{ old('launtrytype') == 'Cuff & Collar' ? 'selected' : '' }}>
                            Cuff & Collar
                        </option>

                        <option value="Premium Softner" {{ old('launtrytype') == 'Premium Softner' ? 'selected' : '' }}>
                            Premium Softner
                        </option>

                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-1">Prices *</label>
                    <input type="text" name="prices" value="{{ old('prices') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                </div>

                <div class="md:col-span-3">
                    <button type="submit"
                        class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition">
                        Add Items
                    </button>
                </div>

            </div>
        </form>


    </div>
@endsection
