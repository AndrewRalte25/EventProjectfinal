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
    <div id="page-content-wrapper" >
        
        <div class="pt-8 mt-8 container position-absolute top-50 start-50 translate-middle " style="display: flex; justify-content: center; align-items: center; height: 30vh">
            <table class="table table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>Payment ID</th> 
                    <th>EventName</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Razorpay ID</th>
                    <th>Price</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($pays as $pay)
                     <tr>
                        <td>{{ $pay->id }}</td>
                        <td>{{ $pay->eventname }}</td>
                        <td>{{ $pay->name }}</td>
                        <td>{{ $pay->email }}</td>
                        <td>{{ $pay->rzp_id }}</td>
                        <td>{{ $pay->price }}</td>     
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    </div>
</div>
    {{ $pays->links() }}

</x-admin-layout>