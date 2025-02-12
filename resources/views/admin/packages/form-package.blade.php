@extends('admin.layouts.app')

@section('title', isset($package) ? 'Edit Package' : 'Create Package')

@section('content')
    <section class="bg-slate-100 xl:ml-64 dark:bg-gray-900">
        <div class="bg-white p-12 mx-auto my-12 rounded-md max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                {{ isset($package) ? 'Edit Package' : 'Create Package' }}</h2>
            <form action="{{ isset($package) ? route('packages.update', $package) : route('packages.store') }}"
                method="POST">
                @csrf
                @if (isset($package))
                    @method('PUT')
                @endif

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('name') text-red-700 dark:text-red-500 @enderror">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg transition-all duration-300 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror"
                            placeholder="Package name" value="{{ old('name', $package->name ?? '') }}" autocomplete="off">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="bandwidth"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('bandwidth') text-red-700 dark:text-red-500 @enderror">Bandwidth</label>
                        <input type="number" name="bandwidth" id="bandwidth"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg transition-all duration-300 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('bandwidth') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror"
                            placeholder="Package bandwidth" value="{{ old('bandwidth', $package->bandwidth ?? '') }}"
                            autocomplete="off" min="0">
                        @error('bandwidth')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="duration"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('duration') text-red-700 dark:text-red-500 @enderror">Duration</label>
                        <input type="number" name="duration" id="duration"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg transition-all duration-300 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('duration') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror"
                            placeholder="Package duration" value="{{ old('duration', $package->duration ?? '') }}"
                            autocomplete="off" min="1">
                        @error('duration')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('price') text-red-700 dark:text-red-500 @enderror">Price</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg transition-all duration-300 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('price') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror"
                            placeholder="Package price" value="{{ old('price', $package->price ?? '') }}" autocomplete="off"
                            min="0">
                        @error('price')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="desc"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('desc') text-red-700 dark:text-red-500 @enderror">Description</label>
                        <textarea id="desc" rows="8" name="desc"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 transition-all duration-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('desc') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror"
                            placeholder="Package desc">{{ old('desc', $package->desc ?? '') }}</textarea>
                        @error('desc')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg transition-all duration-200 focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    {{ isset($package) ? 'Edit Package' : 'Add Package' }}
                </button>
            </form>
        </div>
    </section>
@endsection
