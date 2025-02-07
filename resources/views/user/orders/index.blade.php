@extends('user.layouts.app')

@section('title', 'Order')

@section('content')
    <section class="py-8 antialiased md:py-16">
        <form action="{{ route('user.order.store') }}" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>
                        <div class="relative w-full h-96">
                            <div id="map" class="w-full h-full"></div>
                            <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" id="marker"
                                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" width="40px"
                                height="40px" style="z-index: 1000">
                        </div>

                        <input id="latitude" name="latitude" type="hidden" value="">
                        <input id="longitude" name="longitude" type="hidden" value="">
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Package</h3>
                        @error('package')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            @forelse ($packages as $package)
                                <div
                                    class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="package" aria-describedby="package-text" type="radio"
                                                name="package" value="{{ $package->id }}"
                                                data-price="{{ $package->price }}"
                                                class="package-input h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        </div>

                                        <div class="ms-4 text-sm">
                                            <label for="package"
                                                class="font-medium leading-none text-gray-900 dark:text-white">
                                                {{ $package->name }} | Bandwidth {{ $package->bandwidth }} Mbps
                                            </label>
                                            <p id="package-text"
                                                class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                                                {{ $package->desc }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-4 flex items-center gap-2">
                                        <p
                                            class="text-sm font-medium text-gray-500 dark:text-gray-400 dark:hover:text-white">
                                            IDR {{ number_format($package->price, 2, ',', '.') }} /
                                            {{ $package->duration == 12 ? 'Year' : 'Month' }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                <dd id="subtotal" class="text-base font-medium text-gray-900 dark:text-white">IDR 0
                                </dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Installation Fee</dt>
                                <dd id="fee" class="text-base font-medium text-gray-900 dark:text-white">IDR 0
                                </dd>
                                <input name="fee" type="hidden" value="">
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd id="total" class="text-base font-bold text-gray-900 dark:text-white">IDR 0
                                </dd>
                                <input name="total" type="hidden" value="">
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Place
                            an Order</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        // Total scripts
        document.addEventListener("DOMContentLoaded", function() {
            const packageInputs = document.querySelectorAll(".package-input");
            const subtotalElement = document.getElementById("subtotal");
            const installationFeeElement = document.getElementById("fee");
            const totalElement = document.getElementById("total");

            packageInputs.forEach(input => {
                input.addEventListener("change", function() {
                    let price = parseFloat(this.dataset.price);

                    let installationFee = price * 0.2;
                    let total = price + installationFee;

                    // Input
                    document.querySelector('input[name="fee"]').value = installationFee;
                    document.querySelector('input[name="total"]').value = total;

                    // Text
                    subtotalElement.textContent = `IDR ${price.toLocaleString("id-ID")}`;
                    installationFeeElement.textContent =
                        `IDR ${installationFee.toLocaleString("id-ID")}`;
                    totalElement.textContent = `IDR ${total.toLocaleString("id-ID")}`;
                });
            });
        });

        // Leaflet scripts
        document.addEventListener('DOMContentLoaded', function() {
            var defaultLocation = [-7.867100, 112.523903];

            var map = L.map('map', {
                center: defaultLocation,
                zoom: 15
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            document.getElementById('latitude').value = defaultLocation[0];
            document.getElementById('longitude').value = defaultLocation[1];

            map.on('move', function() {
                var center = map.getCenter();
                document.getElementById('latitude').value = center.lat;
                document.getElementById('longitude').value = center.lng;
            });
        });
    </script>
@endsection
