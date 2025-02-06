@extends('user.layouts.app')

@section('title', 'Order History')

@section('content')
    <section class="bg-slate-100 dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <!-- Start block -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <form class="max-w-md mx-auto">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search" name="search"
                                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 transition-all duration-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search orders" autocomplete="off" required />
                                <button type="submit"
                                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 transition-all duration-200 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">Order Code</th>
                                <th scope="col" class="p-4">Technician</th>
                                <th scope="col" class="p-4">Package</th>
                                <th scope="col" class="p-4">Order Date</th>
                                <th scope="col" class="p-4">Order Status</th>
                                <th scope="col" class="p-4">Installation Date</th>
                                <th scope="col" class="p-4">Total</th>
                                <th scope="col" class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr
                                    class="border-b dark:border-gray-600 transition-all duration-100 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <th scope="row"
                                        class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->code }}
                                    </th>
                                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->technician->name ?? '-' }}
                                    </td>
                                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->package->name }}
                                    </td>
                                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->order_date }}
                                    </td>
                                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($order->order_status == 'unpaid')
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">
                                                {{ ucwords($order->order_status) }}
                                            </span>
                                        @elseif ($order->order_status == 'processing')
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                                                {{ ucwords($order->order_status) }}
                                            </span>
                                        @elseif ($order->order_status == 'completed' || $order->order_status == 'paid')
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                                {{ ucwords($order->order_status) }}
                                            </span>
                                        @elseif ($order->order_status == 'cancelled' || $order->order_status == 'failed' || $order->order_status == 'expired')
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                                {{ ucwords($order->order_status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->installation_date ?? '-' }}
                                    </td>
                                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        IDR {{ number_format($order->total, 0, ',', '.') }}
                                    </td>

                                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex space-x-4">
                                            <a href="{{ route('user.order.show', $order->code) }}"
                                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg transition-all duration-200 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                    class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                </svg>
                                                View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td colspan="11"
                                        class="px-4 py-3 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                            role="alert">
                                            Please make an order.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <nav class="p-5" aria-label="Table navigation">
                    {{ $orders->links() }}
                </nav>
            </div>
        </div>
    </section>
@endsection
