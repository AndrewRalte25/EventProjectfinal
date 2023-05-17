<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper" style="height: 100%; border-right: 1px solid black; position: fixed;">
           
        <div class="list-group list-group-flush">
            <a href="/cate" class="list-group-item list-group-item-action bg-light">Categories</a>
            <a href="/payment" class="list-group-item list-group-item-action bg-light">Payment</a>
            <a href="/users" class="list-group-item list-group-item-action bg-light">Users</a>
            
        </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
    <div id="page-content-wrapper">
</x-admin-layout>
