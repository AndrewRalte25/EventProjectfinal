<x-admin-layout>
    <x-slot name="header" class="border-bottom">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="d-flex" id="wrapper" style="height: 100%;">
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
    <div class="page-content-wrapper" >
        <div class="container position-absolute top-50 start-50 translate-middle " style="display: flex; justify-content: center; align-items: center; height: 30vh">
            <table class="table table-bordered text-center">
        
      
                <thead class="thead-dark">
                <tr>
                    <th>ID</th> 
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        
                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
    {{ $users->links() }}

</x-admin-layout>