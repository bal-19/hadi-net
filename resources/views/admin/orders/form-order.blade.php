@extends('admin.layouts.app')

@section('title', isset($order) ? 'Edit Order' : 'Create Order')

@section('content')
    <section class="bg-slate-100 xl:ml-64 dark:bg-gray-900">
        <div class="bg-white p-12 mx-auto my-12 rounded-md max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                {{ isset($order) ? 'Edit Order' : 'Create Order' }}</h2>

            <form action="{{ isset($order) ? route('orders.update', $order) : route('orders.store') }}" method="POST">
                @csrf
                @if (isset($order))
                    @method('PUT')
                @endif

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <!-- User ID -->
                    <div class="w-full">
                        <label for="user_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                        <select name="user_id" id="user_id"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id', $order->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Technician ID -->
                    <div class="w-full">
                        <label for="technician_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technician</label>
                        <select name="technician_id" id="technician_id"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white">
                            <option value="">None</option>
                            @foreach ($technicians as $tech)
                                <option value="{{ $tech->id }}"
                                    {{ old('technician_id', $order->technician_id ?? '') == $tech->id ? 'selected' : '' }}>
                                    {{ $tech->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Package -->
                    <div class="w-full">
                        <label for="package_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Package</label>
                        <select name="package_id" id="package_id"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white">
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id', $order->package_id ?? '') == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Installation Fee -->
                    <div class="w-full">
                        <label for="installation_fee"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Installation Fee</label>
                        <input type="number" name="installation_fee" id="installation_fee" min="0"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white"
                            value="{{ old('installation_fee', $order->installation_fee ?? '') }}">
                    </div>

                    <!-- Total -->
                    <div class="w-full">
                        <label for="total"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                        <input type="number" name="total" id="total" min="0"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white"
                            value="{{ old('total', $order->total ?? '') }}">
                    </div>

                    <!-- Latitude -->
                    <div class="w-full">
                        <label for="latitude"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                        <input type="text" name="latitude" id="latitude"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white"
                            value="{{ old('latitude', $order->latitude ?? '') }}">
                    </div>

                    <!-- Longitude -->
                    <div class="w-full">
                        <label for="longitude"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                        <input type="text" name="longitude" id="longitude"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white"
                            value="{{ old('longitude', $order->longitude ?? '') }}">
                    </div>

                    <!-- Order Date -->
                    <div class="w-full">
                        <label for="order_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order
                            Date</label>
                        <input type="datetime-local" name="order_date" id="order_date"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white"
                            value="{{ old('order_date', isset($order->order_date) ? \Carbon\Carbon::parse($order->order_date)->format('Y-m-d\TH:i') : '') }}">
                    </div>

                    <!-- Installation Date -->
                    <div class="w-full">
                        <label for="installation_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Installation Date</label>
                        <input type="datetime-local" name="installation_date" id="installation_date"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white"
                            value="{{ old('installation_date', isset($order->installation_date) ? \Carbon\Carbon::parse($order->installation_date)->format('Y-m-d\TH:i') : '') }}">
                    </div>

                    <!-- Expired Date -->
                    <div class="w-full">
                        <label for="expired_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expired Date</label>
                        <input type="datetime-local" name="expired_date" id="expired_date"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white"
                            value="{{ old('expired_date', isset($order->expired_date) ? \Carbon\Carbon::parse($order->expired_date)->format('Y-m-d\TH:i') : '') }}">
                    </div>

                    <!-- Order Status -->
                    <div class="w-full">
                        <label for="order_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order
                            Status</label>
                        <select name="order_status" id="order_status"
                            class="w-full p-2.5 rounded-lg border text-sm dark:bg-gray-700 dark:text-white">
                            @foreach (['expired', 'unpaid', 'paid', 'processing', 'hold', 'completed', 'cancelled'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('order_status', $order->order_status ?? 'unpaid') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 transition-all duration-200 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">
                    {{ isset($order) ? 'Update Order' : 'Create Order' }}
                </button>
            </form>
        </div>
    </section>
@endsection
