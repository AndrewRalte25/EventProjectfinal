<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="container">
        <h1>All  {{ $cates->TYPE }}</h1>
        
        
        <form method="POST" action="/cate/{{ $cates->id }}/addevent/create">
            @csrf
            <button type="submit">ADD EVENT</button>
        </form>
        
        <table class="table py-3">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Timing</th>
                    <th>Contact-Info</th>
                    <th>Price</th>
                    <th>Category ID</th>
                    <th>Image</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody class="py-7">
                @foreach ($events as $event)
                
                    
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->Location }}</td>
                        <td>{{ $event->Opening }}</td>
                        <td>{{ $event->ContactInfo }}</td>
                        <td>{{ $event->Price }}</td>
                        <td>{{ $event->cate_id }}</td>
                        <td>
                        <div class="col-6 justify-content-center">
                            <img src="{{ asset($event->Image) }}" class="img-fluid img-thumbnail mx-auto d-block" alt="mobile screen">
                          </div>
                        </td>
                        <td>
                        <form action="{{ '/cate/'.$cates->id.'/'.$event->id }}" method="post">
                            @csrf
                            @method('DELETE')
    
                            <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                        
                        <button>
                                 <a href="{{ '/event/' . $event->id.'/'.'edit' }}">EDIT</a>
                        </button>
                        
                    </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $events->links() }}
    </div>

</x-admin-layout>