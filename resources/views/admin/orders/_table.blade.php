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
                    <th scope="col" class="p-4">Expired Date</th>
                    <th scope="col" class="p-4">Created At</th>
                    <th scope="col" class="p-4">Updated At</th>
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
                            {{ $order->user->name }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->technician->name ?? '-' }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->package->name }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ \Carbon\Carbon::parse($order->order_date)->setTimezone('Asia/Jakarta') }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($order->order_status == 'unpaid' || $order->order_status == 'hold')
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
                            @elseif ($order->order_status == 'cancelled' || $order->order_status == 'expired')
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
                            {{ $order->installation_date ? \Carbon\Carbon::parse($order->installation_date)->setTimezone('Asia/Jakarta') : '-' }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->expired_date ? \Carbon\Carbon::parse($order->expired_date)->setTimezone('Asia/Jakarta') : '-' }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ \Carbon\Carbon::parse($order->created_at)->setTimezone('Asia/Jakarta') }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ \Carbon\Carbon::parse($order->updated_at)->setTimezone('Asia/Jakarta') }}
                        </td>

                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex space-x-4">
                                @if (auth()->user()->role != 'admin')
                                    <a href="https://www.google.com/maps?q={{ $order->latitude }},{{ $order->longitude }}"
                                        target="_blank"
                                        class="flex items-center text-rose-700 hover:text-white border border-rose-700 transition-all duration-200 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:hover:bg-rose-600 dark:focus:ring-rose-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 2C8.13401 2 5 5.13401 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86599-3.134-7-7-7zM12 11a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                        Open Maps
                                    </a>
                                    <button type="button" data-modal-target="proof-modal-{{ $order->id }}"
                                        data-modal-toggle="proof-modal-{{ $order->id }}"
                                        class="flex items-center text-emerald-700 border border-emerald-700 transition-all duration-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-emerald-500 dark:text-emerald-500
                                        {{ $order->technician_id ? 'hover:text-white hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:hover:text-white dark:hover:bg-emerald-600 dark:focus:ring-emerald-900' : 'opacity-50 cursor-not-allowed' }} {{ !isset($order->installation_proof) ? 'hover:text-white hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:hover:text-white dark:hover:bg-emerald-600 dark:focus:ring-emerald-900' : 'opacity-50 cursor-not-allowed' }}"
                                        {{ $order->technician_id ? '' : 'disabled' }}
                                        {{ !isset($order->installation_proof) ? '' : 'disabled' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M16 12l-4-4m0 0l-4 4m4-4v12" />
                                        </svg>
                                        Upload Proof
                                    </button>
                                @endif
                                @if (auth()->user()->role != 'technician')
                                    <button data-modal-target="preview-modal-{{ $order->id }}"
                                        data-modal-toggle="preview-modal-{{ $order->id }}" type="button"
                                        class="flex items-center text-indigo-700 hover:text-white border border-indigo-700 transition-all duration-200 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-indigo-500 dark:text-indigo-500 dark:hover:text-white dark:hover:bg-indigo-600 dark:focus:ring-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 10l4.553-4.553a1 1 0 00-1.414-1.414L13 8.586 6.414 2 5 3.414 11.586 10 2 19.586 3.414 21 13 11.414 19.586 18 21 16.586 14.414 10z" />
                                        </svg>
                                        Preview
                                    </button>
                                    <button data-modal-target="assign-technician-modal-{{ $order->id }}"
                                        data-modal-toggle="assign-technician-modal-{{ $order->id }}"
                                        type="button"
                                        class="flex items-center border transition-all duration-200 font-medium rounded-lg text-sm px-3 py-2 text-center text-emerald-700 border-emerald-700 dark:border-emerald-500 dark:text-emerald-500 {{ !isset($order->technician_id) ? 'hover:text-white hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:hover:text-white dark:hover:bg-emerald-600 dark:focus:ring-emerald-900' : 'opacity-50 cursor-not-allowed' }} {{ $order->order_status == 'processing' ? 'hover:text-white hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:hover:text-white dark:hover:bg-emerald-600 dark:focus:ring-emerald-900' : 'opacity-50 cursor-not-allowed' }}"
                                        {{ $order->order_status == 'processing' ? '' : 'disabled' }}
                                        {{ !isset($order->technician_id) ? '' : 'disabled' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        Assign
                                    </button>
                                @endif
                                @if (auth()->user()->role == 'super admin')
                                    <a href="{{ route('orders.edit', $order) }}"
                                        class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg transition-all duration-200 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                            viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="delete-confirm flex items-center text-red-700 hover:text-white border border-red-700 transition-all duration-200 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>

                    @if (auth()->user()->role != 'technician')
                        <div id="preview-modal-{{ $order->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center flex">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Bukti
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="preview-modal-{{ $order->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 space-y-4 text-center">
                                        @if ($order->payment_proof)
                                            <img src="{{ asset('storage/' . $order->payment_proof) }}"
                                                alt="Bukti Pembayaran"
                                                class="mx-auto max-w-full max-h-96 rounded-lg shadow" />
                                            <div class="flex justify-center gap-3 mt-4">
                                                <form action="{{ route('orders.confirmPayment', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @if ($order->order_status == 'paid' || $order->order_status == 'hold')
                                                        <button type="submit"
                                                            class="flex items-center text-green-700 border border-green-700 transition-all duration-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 hover:text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 mr-2 -ml-0.5" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Confirm Payment
                                                        </button>
                                                    @else
                                                        <button type="submit"
                                                            class="flex items-center text-green-700 border border-green-700 transition-all duration-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 opacity-50 cursor-not-allowed"
                                                            disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 mr-2 -ml-0.5" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Confirm Payment
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
                                        @else
                                            <p class="text-sm text-gray-500 dark:text-gray-300">Belum ada bukti
                                                pembayaran.
                                            </p>
                                        @endif
                                        @if ($order->installation_proof)
                                            <h4 class="text-md font-semibold text-gray-700 dark:text-gray-200 mt-6">
                                                Bukti Pemasangan</h4>
                                            <img src="{{ asset('storage/' . $order->installation_proof) }}"
                                                alt="Bukti Pemasangan"
                                                class="mx-auto max-w-full max-h-96 rounded-lg shadow mt-2" />

                                            <div class="flex justify-center gap-3 mt-4">
                                                <!-- Approve Button -->
                                                <form action="{{ route('orders.approveInstallation', $order) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="flex items-center text-blue-700 border border-blue-700 transition-all duration-200 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-blue-500 dark:text-blue-500 {{ $order->order_status == 'processing' ? 'hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900' : 'opacity-50 cursor-not-allowed' }}"
                                                        {{ $order->order_status == 'processing' ? '' : 'disabled' }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 mr-2 -ml-0.5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Approve
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <p class="text-sm text-gray-500 dark:text-gray-300 mt-6">Belum ada bukti
                                                pemasangan.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="assign-technician-modal-{{ $order->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center flex">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Assign Teknisi
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="assign-technician-modal-{{ $order->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 space-y-4">
                                        <form action="{{ route('orders.assignTechnician', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            <div>
                                                <label for="technician_id"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                                    Teknisi</label>
                                                <select id="technician_id" name="technician_id" required
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                    <option value="" disabled selected>Pilih teknisi</option>
                                                    @foreach ($technicians as $technician)
                                                        <option value="{{ $technician->id }}">{{ $technician->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="installation_date"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Installation
                                                    Date</label>
                                                <input type="datetime-local" id="installation_date"
                                                    name="installation_date" required
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            </div>

                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (auth()->user()->role != 'admin')
                        <div id="proof-modal-{{ $order->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center flex">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Upload Installation Proof
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="proof-modal-{{ $order->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="p-4 space-y-4">
                                        <form action="{{ route('orders.uploadInstallationProof', $order) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-4">
                                                <label for="installation_proof"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                                                    Bukti (Foto)</label>
                                                <input type="file" name="installation_proof"
                                                    id="installation_proof" accept="image/*" required
                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                            </div>

                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                    Upload
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @empty
                    @if (auth()->user()->role == 'technician')
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td colspan="15"
                                class="px-4 py-3 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                    role="alert">
                                    There is no assignment
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td colspan="15"
                                class="px-4 py-3 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                    role="alert">
                                    Orders table are empty.
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforelse
            </tbody>
        </table>
    </div>
    <nav class="p-5" aria-label="Table navigation">
        {{ $orders->links() }}
    </nav>
</div>
