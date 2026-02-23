@extends('admin.include.layout')

@section('heading', 'Laundry')
@section('title', ' Laundry List')

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
            <h2 class="text-xl font-bold">Set Laundry Weight</h2>

            <div class="flex gap-2">


                <a href="{{ route('set.create') }}"
                    class="inline-block bg-purple-700 hover:bg-purple-600
                  text-white px-5 py-2 rounded-lg font-semibold">
                    + Set Weigth Price
                </a>

            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Weigth</th>
                        <th class="border px-4 py-2">Laundry Type</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($datas as $key => $data)
                        <tr>
                            <td class="border px-4 py-2">{{ $key + 1 }}</td>
                            <td class="border px-4 py-2">{{ $data->weight }}</td>
                            <td class="border px-4 py-2">{{ $data->laundrytype }}</td>
                            <td class="border px-4 py-2">{{ $data->prices }}</td>
                            <td class="border px-4 py-2"></td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No data here !
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $datas->links() }}
        </div>
    </div>


    <div class="max-w-7xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Invoice List</h2>

            <div class="flex gap-2">


                <a href="{{ route('weigthinvform') }}"
                    class="inline-block bg-purple-700 hover:bg-purple-600
                  text-white px-5 py-2 rounded-lg font-semibold">
                    + Invoice Generate
                </a>

            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Weigth</th>
                        <th class="border px-4 py-2">Laundry Type</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>

    </div>


@endsection
