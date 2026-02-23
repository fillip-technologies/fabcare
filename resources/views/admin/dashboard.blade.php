@extends('admin.include.layout')

@section('title', 'Dashboard')

@section('content')

<!-- ===================== STATS CARDS ===================== -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- Total Users -->
    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">Total Users</p>
                <h3 class="text-2xl font-bold mt-2">0</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Active Bookings -->
    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">Active Bookings</p>
                <h3 class="text-2xl font-bold mt-2">0</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                <i class="fas fa-calendar-check text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">Total Products</p>
                <h3 class="text-2xl font-bold mt-2">0</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                <i class="fas fa-box text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Orders -->
    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
        <div class="flex justify-between">
            <div>
                <p class="text-gray-500">Order Requests</p>
                <h3 class="text-2xl font-bold mt-2">0</h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                <i class="fas fa-shopping-cart text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>

</div>


@endsection







