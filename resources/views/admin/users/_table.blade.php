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
                        placeholder="Search Users" autocomplete="off" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 transition-all duration-200 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>

        <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <a href="{{ route('users.create') }}"
                class="flex items-center justify-center text-white bg-primary-700 transition-all duration-200 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add User
            </a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">Name</th>
                    <th scope="col" class="p-4">Role</th>
                    <th scope="col" class="p-4">Gender</th>
                    <th scope="col" class="p-4">Age</th>
                    <th scope="col" class="p-4">Address</th>
                    <th scope="col" class="p-4">Phone Number</th>
                    <th scope="col" class="p-4">Email</th>
                    <th scope="col" class="p-4">Created At</th>
                    <th scope="col" class="p-4">Updated At</th>
                    <th scope="col" class="p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr
                        class="border-b dark:border-gray-600 transition-all duration-100 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <th scope="row" id="name"
                            class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($user->role == 'super admin')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                    {{ ucwords($user->role) }}
                                </span>
                            @elseif ($user->role == 'admin')
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-purple-900 dark:text-purple-300">
                                    {{ ucwords($user->role) }}
                                </span>
                            @elseif ($user->role == 'technician')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">
                                    {{ ucwords($user->role) }}
                                </span>
                            @elseif ($user->role == 'user')
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                                    {{ ucwords($user->role) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($user->gender == 'male')
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                                    {{ ucwords($user->gender) }}
                                </span>
                            @elseif ($user->gender == 'female')
                                <span
                                    class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-pink-900 dark:text-pink-300">
                                    {{ ucwords($user->gender) }}
                                </span>
                            @else
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300">
                                    {{ ucwords($user->gender) }}
                                </span>
                            @endif

                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->born_date }}
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->address }}</td>
                        <td id="phoneNumber"
                            class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->phone_number }}</td>
                        <td id="email"
                            class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->email }}</td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->created_at }}</td>
                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->updated_at }}</td>

                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex space-x-4">
                                <a href="{{ route('users.edit', $user) }}"
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
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
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
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td colspan="10"
                            class="px-4 py-3 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                role="alert">
                                Users table are empty.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <nav class="p-5" aria-label="Table navigation">
        {{ $users->links() }}
    </nav>
</div>
