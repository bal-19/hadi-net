<div class="h-full p-3 space-y-2 w-60 bg-gray-800 text-white dark:bg-gray-50 dark:text-gray-800">
    <div class="flex items-center p-2 space-x-4">
        <img src="https://api.dicebear.com/7.x/initials/svg?seed={{ strtoupper(substr(auth()->user()->name, 0, 1)) }}"
            alt="Profile Picture" class="w-12 h-12 rounded-full dark:bg-gray-500">
        <div>
            <a href="#" class="text-lg font-semibold hover:underline">{{ auth()->user()->name }}</a>
            @if (auth()->user()->role == 'super admin')
                <span
                    class="bg-gray-700 text-red-400 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-100 dark:text-red-800 border border-red-400">
                    {{ ucwords(auth()->user()->role) }}
                </span>
            @elseif (auth()->user()->role == 'admin')
                <span
                    class="bg-gray-700 text-purple-400 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-purple-100 dark:text-purple-800 border border-purple-400">
                    {{ ucwords(auth()->user()->role) }}
                </span>
            @elseif (auth()->user()->role == 'technician')
                <span
                    class="bg-gray-700 text-yellow-300 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-100 dark:text-yellow-800 border border-yellow-300">
                    {{ ucwords(auth()->user()->role) }}
                </span>
            @endif
        </div>
    </div>
    <div class="divide-y dark:divide-gray-300">
        <ul class="pt-2 pb-4 space-y-1 text-sm">
            <li class="dark:bg-gray-100 dark:text-gray-900">
                <a rel="noopener noreferrer" href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 space-x-3 rounded-md group transition-all duration-300 ease-in-out transform hover:bg-gray-600 dark:hover:bg-gray-300 hover:scale-105 aria-[current=page]:bg-gray-600 dark:aria-[current=page]:bg-gray-300 aria-[current=page]:scale-105"
                    aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : '' }}"
                        class="w-5 h-5 fill-current text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:group-hover:text-gray-900 transition-colors duration-300">
                        <path
                            d="M68.983,382.642l171.35,98.928a32.082,32.082,0,0,0,32,0l171.352-98.929a32.093,32.093,0,0,0,16-27.713V157.071a32.092,32.092,0,0,0-16-27.713L272.334,30.429a32.086,32.086,0,0,0-32,0L68.983,129.358a32.09,32.09,0,0,0-16,27.713V354.929A32.09,32.09,0,0,0,68.983,382.642ZM272.333,67.38l155.351,89.691V334.449L272.333,246.642ZM256.282,274.327l157.155,88.828-157.1,90.7L99.179,363.125ZM84.983,157.071,240.333,67.38v179.2L84.983,334.39Z">
                        </path>
                    </svg>
                    <span
                        class="text-gray-300 group-hover:text-white aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 dark:text-gray-700 dark:group-hover:text-gray-900 transition-colors duration-300"
                        aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : '' }}">Dashboard</span>
                </a>
            </li>
            <li>
                <a rel="noopener
                        noreferrer" href="{{ route('users.index') }}"
                    class="flex items-center p-2 space-x-3 rounded-md group transition-all duration-300 ease-in-out transform hover:bg-gray-600 dark:hover:bg-gray-300 hover:scale-105 aria-[current=page]:bg-gray-600 dark:aria-[current=page]:bg-gray-300 aria-[current=page]:scale-105"
                    aria-current="{{ request()->routeIs('users.index') ? 'page' : '' }}">
                    <svg class="w-5 h-5 fill-current text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:group-hover:text-gray-900 transition-colors duration-300 aria-current="{{ request()->routeIs('users.index') ? 'page' : '' }}""
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                    <span
                        class="text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:text-gray-700 dark:group-hover:text-gray-900 transition-colors duration-300"
                        aria-current="{{ request()->routeIs('users.index') ? 'page' : '' }}">Users</span>
                </a>

            </li>
            <li>
                <a rel="noopener noreferrer" href="{{ route('packages.index') }}"
                    class="flex items-center p-2 space-x-3 rounded-md group transition-all duration-300 ease-in-out transform hover:bg-gray-600 dark:hover:bg-gray-300 hover:scale-105 aria-[current=page]:bg-gray-600 dark:aria-[current=page]:bg-gray-300 aria-[current=page]:scale-105"
                    aria-current="{{ request()->routeIs('packages.index') ? 'page' : '' }}">
                    <svg class="w-5 h-5 fill-current text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:group-hover:text-gray-900 transition-colors duration-300"
                        aria-current="{{ request()->routeIs('packages.index') ? 'page' : '' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                    </svg>
                    <span
                        class="text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:text-gray-700 dark:group-hover:text-gray-900 transition-colors duration-300"
                        aria-current="{{ request()->routeIs('packages.index') ? 'page' : '' }}">Packages</span>
                </a>
            </li>
            <li>
                <a rel="noopener noreferrer" href="{{ route('orders.index') }}"
                    class="flex items-center p-2 space-x-3 rounded-md group transition-all duration-300 ease-in-out transform hover:bg-gray-600 dark:hover:bg-gray-300 hover:scale-105 aria-[current=page]:bg-gray-600 dark:aria-[current=page]:bg-gray-300 aria-[current=page]:scale-105"
                    aria-current="{{ request()->routeIs('orders.index') ? 'page' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-5 h-5 fill-current text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:group-hover:text-gray-900 transition-colors duration-300"
                        aria-current="{{ request()->routeIs('orders.index') ? 'page' : '' }}">
                        <path
                            d="M203.247,386.414,208,381.185V355.4L130.125,191H93.875L16,355.4v27.042l4.234,4.595a124.347,124.347,0,0,0,91.224,39.982h.42A124.343,124.343,0,0,0,203.247,386.414ZM176,368.608a90.924,90.924,0,0,1-64.231,26.413h-.33A90.907,90.907,0,0,1,48,369.667V362.6l64-135.112L176,362.6Z">
                        </path>
                        <path
                            d="M418.125,191h-36.25L304,355.4v27.042l4.234,4.595a124.347,124.347,0,0,0,91.224,39.982h.42a124.343,124.343,0,0,0,91.369-40.607L496,381.185V355.4ZM464,368.608a90.924,90.924,0,0,1-64.231,26.413h-.33A90.907,90.907,0,0,1,336,369.667V362.6l64-135.112L464,362.6Z">
                        </path>
                        <path
                            d="M272,196.659A56.223,56.223,0,0,0,309.659,159H416V127H309.659a55.991,55.991,0,0,0-107.318,0H96v32H202.341A56.223,56.223,0,0,0,240,196.659V463H136v32H376V463H272ZM232,143a24,24,0,1,1,24,24A24,24,0,0,1,232,143Z">
                        </path>
                    </svg>
                    <span
                        class="text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:text-gray-700 dark:group-hover:text-gray-900 transition-colors duration-300"
                        aria-current="{{ request()->routeIs('orders.index') ? 'page' : '' }}">Orders</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 pb-2 space-y-1 text-sm">
            <li>
                <a rel="noopener noreferrer" href="#"
                    class="flex items-center p-2 space-x-3 rounded-md group transition-all duration-300 ease-in-out transform hover:bg-gray-600 dark:hover:bg-gray-300 hover:scale-105 aria-[current=page]:bg-gray-600 dark:aria-[current=page]:bg-gray-300 aria-[current=page]:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-5 h-5 fill-current text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:group-hover:text-gray-900 transition-colors duration-300">
                        <path
                            d="M245.151,168a88,88,0,1,0,88,88A88.1,88.1,0,0,0,245.151,168Zm0,144a56,56,0,1,1,56-56A56.063,56.063,0,0,1,245.151,312Z">
                        </path>
                        <path
                            d="M464.7,322.319l-31.77-26.153a193.081,193.081,0,0,0,0-80.332l31.77-26.153a19.941,19.941,0,0,0,4.606-25.439l-32.612-56.483a19.936,19.936,0,0,0-24.337-8.73l-38.561,14.447a192.038,192.038,0,0,0-69.54-40.192L297.49,32.713A19.936,19.936,0,0,0,277.762,16H212.54a19.937,19.937,0,0,0-19.728,16.712L186.05,73.284a192.03,192.03,0,0,0-69.54,40.192L77.945,99.027a19.937,19.937,0,0,0-24.334,8.731L21,164.245a19.94,19.94,0,0,0,4.61,25.438l31.767,26.151a193.081,193.081,0,0,0,0,80.332l-31.77,26.153A19.942,19.942,0,0,0,21,347.758l32.612,56.483a19.937,19.937,0,0,0,24.337,8.73l38.562-14.447a192.03,192.03,0,0,0,69.54,40.192l6.762,40.571A19.937,19.937,0,0,0,212.54,496h65.222a19.936,19.936,0,0,0,19.728-16.712l6.763-40.572a192.038,192.038,0,0,0,69.54-40.192l38.564,14.449a19.938,19.938,0,0,0,24.334-8.731L469.3,347.755A19.939,19.939,0,0,0,464.7,322.319Zm-50.636,57.12-48.109-18.024-7.285,7.334a159.955,159.955,0,0,1-72.625,41.973l-10,2.636L267.6,464h-44.89l-8.442-50.642-10-2.636a159.955,159.955,0,0,1-72.625-41.973l-7.285-7.334L76.241,379.439,53.8,340.562l39.629-32.624-2.7-9.973a160.9,160.9,0,0,1,0-83.93l2.7-9.972L53.8,171.439l22.446-38.878,48.109,18.024,7.285-7.334a159.955,159.955,0,0,1,72.625-41.973l10-2.636L222.706,48H267.6l8.442,50.642,10,2.636a159.955,159.955,0,0,1,72.625,41.973l7.285,7.334,48.109-18.024,22.447,38.877-39.629,32.625,2.7,9.972a160.9,160.9,0,0,1,0,83.93l-2.7,9.973,39.629,32.623Z">
                        </path>
                    </svg>
                    <span
                        class="text-gray-300 aria-[current=page]:text-white dark:aria-[current=page]:text-gray-900 group-hover:text-white dark:text-gray-700 dark:group-hover:text-gray-900 transition-colors duration-300">Settings</span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" rel="noopener noreferrer"
                        class="flex items-center w-full p-2 space-x-3 rounded-md group transition-all duration-300 ease-in-out transform hover:bg-gray-600 dark:hover:bg-gray-300 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-5 h-5 fill-current text-gray-300 group-hover:text-white dark:group-hover:text-gray-900 transition-colors duration-300">
                            <path
                                d="M440,424V88H352V13.005L88,58.522V424H16v32h86.9L352,490.358V120h56V456h88V424ZM320,453.642,120,426.056V85.478L320,51Z">
                            </path>
                            <rect width="32" height="64" x="256" y="232"></rect>
                        </svg>
                        <span
                            class="text-gray-300 group-hover:text-white dark:text-gray-700 dark:group-hover:text-gray-900 transition-colors duration-300">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
