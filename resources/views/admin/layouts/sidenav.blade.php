<div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <ul class="space-y-2">
        <li>
            <a href="#"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition-all duration-300 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg aria-hidden="true"
                    class="w-6 h-6 text-gray-400 transition duration-300 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                </svg>
                <span class="ml-3">Overview</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition-all duration-300 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
    {{ request()->routeIs('users.index') ? 'bg-gray-200 dark:bg-gray-800' : '' }}">
                <svg aria-hidden="true"
                    class="w-6 h-6 text-gray-400 transition duration-300 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('users.index') ? 'text-gray-900 dark:text-white' : '' }}"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                </svg>
                <span class="ml-3">Users</span>
            </a>

        </li>
        <li>
            <a href="{{ route('packages.index') }}"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition-all duration-300 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('packages.index') ? 'bg-gray-200 dark:bg-gray-800' : '' }}">
                <svg aria-hidden="true"
                    class="w-6 h-6 text-gray-400 transition duration-300 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('packages.index') ? 'text-gray-900 dark:text-white' : '' }}"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path
                        d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                </svg>
                <span class="ml-3">Packages</span>
            </a>
        </li>
        <li>
            <a href="{{ route('orders.index') }}"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition-all duration-300 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('orders.index') ? 'bg-gray-200 dark:bg-gray-800' : '' }}">
                <svg aria-hidden="true"
                    class="w-6 h-6 text-gray-400 transition duration-300 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('orders.index') ? 'text-gray-900 dark:text-white' : '' }}"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                        d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8l0 464c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488L0 24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 144zM80 352c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 336c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 240z" />
                </svg>
                <span class="ml-3">Orders</span>
            </a>
        </li>
        {{-- <li>
            <a href="#"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-300 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                    </path>
                    <path
                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                    </path>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Messages</span>
                <span
                    class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800">
                    6
                </span>
            </a>
        </li>
        <li>
            <button type="button"
                class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-300 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                aria-controls="dropdown-authentication" data-collapse-toggle="dropdown-authentication">
                <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-300 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap">Authentication</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                <li>
                    <a href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-300 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sign
                        In</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-300 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sign
                        Up</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-300 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Forgot
                        Password</a>
                </li>
            </ul>
        </li> --}}
    </ul>
</div>
<div
    class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white dark:bg-gray-800 z-20 border-r border-gray-200 dark:border-gray-700">
    <a href="#" data-tooltip-target="tooltip-logout"
        class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer transition-all duration-300 dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill-rule="evenodd"
                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
                clip-rule="evenodd" />
        </svg>
    </a>
    <div id="tooltip-logout" role="tooltip"
        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
        Logout
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <a href="#" data-tooltip-target="tooltip-settings"
        class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer transition-all duration-300 dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                clip-rule="evenodd"></path>
        </svg>
    </a>
    <div id="tooltip-settings" role="tooltip"
        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
        Account Settings
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>
