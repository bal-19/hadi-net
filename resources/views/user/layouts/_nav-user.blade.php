<!-- Apps -->
<button type="button" data-dropdown-toggle="apps-dropdown"
    class="p-2 text-gray-500 rounded-lg transition-all duration-300 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
    <span class="sr-only">View notifications</span>
    <!-- Icon -->
    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
        <path
            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
    </svg>
</button>
<!-- Dropdown menu -->
<div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600"
    id="apps-dropdown">
    <div
        class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        Apps
    </div>
    <div class="grid grid-cols-3 gap-4 p-4">
        <a href="/order"
            class="block p-4 text-center rounded-lg duration-200 transition-all hover:bg-gray-100 dark:hover:bg-gray-600 group">
            <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 duration-200 transition-all group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor"
                viewBox="0 0 640
            512">
                <path
                    d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
            </svg>
            <div class="text-sm font-medium text-gray-900 dark:text-white">Order</div>
        </a>
        <a href="{{ route('user.order.history') }}"
            class="block p-4 text-center rounded-lg duration-200 transition-all hover:bg-gray-100 dark:hover:bg-gray-600 group">
            <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 duration-200 transition-all group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                <path
                    d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" />
            </svg>
            <div class="text-sm font-medium text-gray-900 dark:text-white">Order History</div>
        </a>
        <a href="#"
            class="block p-4 text-center rounded-lg duration-200 transition-all hover:bg-gray-100 dark:hover:bg-gray-600 group">
            <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 duration-200 transition-all group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
            </svg>
            <div class="text-sm font-medium text-gray-900 dark:text-white">Settings</div>
        </a>
    </div>
</div>
<button type="button"
    class="flex mx-3 text-sm bg-gray-800 rounded-full transition-all duration-300 md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
    <span class="sr-only">Open user menu</span>
    <img class="w-8 h-8 rounded-full"
        src="https://api.dicebear.com/7.x/initials/svg?seed={{ strtoupper(substr(Auth::user()->name, 0, 1)) }}"
        alt="user photo">
</button>
<!-- Dropdown menu -->
<div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
    id="dropdown">
    <div class="py-3 px-4">
        <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
    </div>
    <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
        <li>
            <a href="#"
                class="block py-2 px-4 text-sm duration-200 transition-all hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account
                settings</a>
        </li>
    </ul>
    <ul class="py-1 text-gray-500  dark:text-gray-400" aria-labelledby="dropdown">
        <li class="duration-200 transition-all hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    Sign out
                </button>
            </form>
        </li>
    </ul>
</div>
