<nav class="bg-white border-gray-200 shadow-sm px-4 lg:px-6 py-2.5 dark:bg-gray-800">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <a href="https://flowbite.com" class="flex mr-4">
                <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="FlowBite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SenoNet</span>
            </a>
        </div>
        <div class="flex items-center lg:order-2">
            @if (Auth::check())
                @include('user.layouts._nav-user')
            @else
                @include('user.layouts._nav-guest')
            @endif
        </div>
    </div>
</nav>
