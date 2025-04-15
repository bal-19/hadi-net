@extends('user.layouts.app')

@section('title', 'Order Summary')

@section('content')
    <section class="py-8 antialiased md:py-16">
        @if ($order->order_status == 'completed')
            <div class="mx-auto mb-2 max-w-4xl">
                <div class="flex items-center justify-between">
                    <div id="tooltip-print" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        Print Receipt
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button onclick="printReceipt()" data-tooltip-target="tooltip-print" data-tooltip-placement="right"
                        class="p-2 text-gray-500 rounded cursor-pointer transition-all duration-300 dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M128 0C92.7 0 64 28.7 64 64l0 96 64 0 0-96 226.7 0L384 93.3l0 66.7 64 0 0-66.7c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0L128 0zM384 352l0 32 0 64-256 0 0-64 0-16 0-16 256 0zm64 32l32 0c17.7 0 32-14.3 32-32l0-96c0-35.3-28.7-64-64-64L64 192c-35.3 0-64 28.7-64 64l0 96c0 17.7 14.3 32 32 32l32 0 0 64c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-64zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        <div id="print-area" class="bg-white p-12 mx-auto max-w-4xl rounded-md dark:bg-gray-900">
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
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">
                        {{ $order->user->phone_number }}
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

                    @if ($order->order_status == 'unpaid')
                        <div class="sm:flex sm:items-center">
                            <form action="{{ route('user.order.cancel', $order) }}" method="POST"
                                class="flex w-full items-center justify-center">
                                @csrf
                                <button type="submit" id="cancel-button"
                                    class="w-full items-center justify-center rounded-lg border border-red-700 px-5 py-2.5 text-sm font-medium text-red-700 duration-300 transition-all hover:bg-red-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300  dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 sm:mt-0">Cancel
                                    Order</button>
                                <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal"
                                    class="mt-4 mx-1 flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white duration-300 transition-all hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0">Proceed
                                    to Payment</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Start Modal Section --}}
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <form action="{{ route('user.order.uploadProof', $order) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Payment
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div id="accordion-flush" data-accordion="collapse"
                                data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="accordion-flush-heading-1">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                        data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                                        aria-controls="accordion-flush-body-1">
                                        <span>How to pay?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-1" class="hidden"
                                    aria-labelledby="accordion-flush-heading-1">
                                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                        <ol
                                            class="ps-5 mt-2 space-y-1 list-decimal list-inside text-gray-500 dark:text-gray-400">
                                            <li>
                                                Silakan lakukan transfer ke rekening berikut: <br>
                                                <b>Bank BRI – 1234567890 a.n. CV Seno Net</b>
                                            </li>
                                            <li>
                                                Pastikan jumlah yang ditransfer sesuai dengan total tagihan Anda.
                                            </li>
                                            <li>
                                                Setelah melakukan transfer, simpan bukti transfer Anda (screenshot atau foto
                                                struk).
                                            </li>
                                            <li>
                                                Unggah bukti transfer anda pada halaman ini, kemudian tekan tombol
                                                <b>Upload</b>
                                            </li>
                                            <li>
                                                Setelah berhasil mengirim konfirmasi, tim kami akan memverifikasi dalam
                                                waktu
                                                maksimal 1×24 jam.
                                            </li>
                                            <li>
                                                Anda akan menerima notifikasi melalui Email setelah pembayaran Anda
                                                dikonfirmasi.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <label
                                class="block
                            mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="payment_proof">Upload
                                file</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="payment_proof" name="payment_proof"
                                type="file" accept="image/*">
                            @error('payment_proof')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
                                GIF
                                (MAX. 2 MB).</p>

                            <img id="imagePreview"
                                class="mt-4 w-72 h-72 object-cover rounded-lg shadow-md border border-gray-300 hidden" />

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="static-modal" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                            <button data-modal-hide="static-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- End Modal Section --}}
    </section>

    @push('script')
        <script>
            // fungsi printing
            function printReceipt() {
                var printContent = document.getElementById("print-area").innerHTML;
                var originalContent = document.body.innerHTML;

                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = originalContent;
            }

            // fungsi preview gambar
            document.getElementById('payment_proof').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('imagePreview');

                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '';
                    preview.classList.add('hidden');
                }
            });
        </script>
    @endpush
@endsection
