@extends('user.layouts.app')

@section('title', 'Order Summary')

@section('content')
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-3xl">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order summary</h2>
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
            </div>

            <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Delivery information</h4>

                <dl>
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">{{ $order->user->name }}
                    </dd>
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">{{ $order->user->phone_number }}
                    </dd>
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">{{ $order->user->address }}
                    </dd>
                </dl>
                <dl>
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">Technician :
                        {{ $order->technician->name ?? '-' }}
                    </dd>
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">Installation Date :
                        {{ $order->installation_date ?? '-' }}
                    </dd>
                </dl>
            </div>

            <div class="mt-6 sm:mt-8">
                <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Package information</h4>
                    <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            <tr>
                                <td class="whitespace-nowrap py-4 md:w-[384px]">
                                    <div class="flex items-center gap-4">
                                        <p class="hover:underline">{{ $order->package->name }}</p>
                                    </div>
                                </td>

                                <td class="p-4 text-base font-normal text-gray-900 dark:text-white">
                                    {{ $order->package->bandwidth }} Mbps</td>

                                <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">
                                    IDR
                                    {{ number_format($order->package->price, 2, ',', '.') }}/{{ $order->package->duration == 12 ? 'Year' : 'Month' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 space-y-6">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</h4>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-gray-500 dark:text-gray-400">Original price</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    IDR {{ number_format($order->package->price, 2, ',', '.') }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-gray-500 dark:text-gray-400">Installation Fee</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    IDR {{ number_format($order->installation_fee, 2, ',', '.') }}</dd>
                            </dl>
                        </div>

                        <dl
                            class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">IDR
                                {{ number_format($order->total, 2, ',', '.') }}</dd>
                        </dl>
                    </div>

                    <div class="sm:flex sm:items-center">
                        <button type="button" id="cancel-button"
                            class="mt-4 mx-1 flex w-full items-center justify-center rounded-lg border border-red-700 px-5 py-2.5 text-sm font-medium text-red-700 duration-300 transition-all hover:bg-red-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 sm:mt-0">Cancel
                            Order</button>
                        <button type="button" id="pay-button"
                            class="mt-4 mx-1 flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white duration-300 transition-all hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0">Proceed
                            to Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>
    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $order->code }}');
        };
    </script>
@endsection
