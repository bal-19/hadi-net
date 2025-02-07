<!-- Start block -->
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
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">Code</th>
                <th scope="col" class="p-4">Customer</th>
                <th scope="col" class="p-4">Technician</th>
                <th scope="col" class="p-4">Package</th>
                <th scope="col" class="p-4">Order Date</th>
                <th scope="col" class="p-4">Order Status</th>
                <th scope="col" class="p-4">Installation Fee</th>
                <th scope="col" class="p-4">Total</th>
                <th scope="col" class="p-4">Latitude</th>
                <th scope="col" class="p-4">Longitude</th>
                <th scope="col" class="p-4">Installation Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr
                    class="border-b dark:border-gray-600 transition-all duration-100 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <th scope="row" class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->code }}
                    </th>
                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->user->name }}
                    </td>
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
                        IDR {{ number_format($order->installation_fee, 2, ',', '.') }}

                    </td>
                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        IDR {{ number_format($order->total, 2, ',', '.') }}
                    </td>
                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->latitude }}
                    </td>
                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->longitude }}
                    </td>
                    <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->installation_date ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td colspan="11"
                        class="px-4 py-3 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                            role="alert">
                            All orders have been processed
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
