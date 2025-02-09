@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="bg-slate-100 dark:bg-gray-900 p-3 xl:ml-64 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <!-- Logo -->
            <div class="flex items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Dashboard</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card: Total Users -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 flex items-center">
                    <i class="fa fa-users text-blue-500 text-2xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Total User</h3>
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                            {{ number_format($dashboard['totalUser'], 0, '.', ',') }}</p>
                    </div>
                </div>
                <!-- Card: Total Orders -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 flex items-center">
                    <i class="fa fa-shopping-cart text-green-500 text-2xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Total Order</h3>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                            {{ number_format($dashboard['totalOrder'], 0, '.', ',') }}</p>
                    </div>
                </div>
                <!-- Card: Revenue -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 flex items-center">
                    <i class="fa fa-dollar-sign text-yellow-500 text-2xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Total Revenue</h3>
                        <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">IDR
                            {{ number_format($dashboard['totalRevenue'], 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Waiting to be processed</h3>
                {{-- Start table --}}
                @include('admin._table', ['orders' => $dashboard['paidOrders']])
                {{-- End table --}}
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Total Revenue Every Month</h3>
                {{-- Start chart --}}
                @include('admin._revenue-chart', [
                    'key' => $dashboard['labels'],
                    'value' => $dashboard['revenues'],
                ])
                {{-- End chart --}}
            </div>
        </div>
    </section>
@endsection
