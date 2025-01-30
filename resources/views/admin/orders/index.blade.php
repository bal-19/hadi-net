@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')
    <!-- Start table -->
    <section class="bg-slate-100 dark:bg-gray-900 p-3 xl:ml-64 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            @include('admin.orders._table', ['orders' => $orders])
        </div>
    </section>
    <!-- End table -->
@endsection
