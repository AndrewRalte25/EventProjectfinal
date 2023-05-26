<x-app-layout>
    <x-slot name="header" class="container position-absolute">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome!!') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>All {{ $cates->TYPE }}</h1>
        <table class="table py-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Timing</th>
                    <th>Contact-Info</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody class="py-7">
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->Location }}</td>
                    <td>{{ $event->Opening }}</td>
                    <td>{{ $event->ContactInfo }}</td>
                    <td>{{ $event->Price }}</td>
                    <td>
                        <div class="col-6 justify-content-center">
                            <img src="{{ asset($event->Image) }}" class="img-fluid img-thumbnail mx-auto d-block" alt="mobile screen">
                        </div>
                    </td>
                    <td>
                        <div class="card-body text-center">
                            <form action="/razorpaypayment" method="POST">
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZOR_KEY') }}"
                                    data-amount="{{ $event->price*100 }}"
                                    data-buttontext="BOOK"
                                    data-name="EVENT BOOKING"
                                    data-description="Razorpay payment"
                                    data-image="/images/logo-icon.png"
                                    data-prefill.name="{{ Auth::user()->name }}"
                                    data-prefill.email="{{ Auth::user()->email }}"
                                    data-theme.color="#ff7529">
                                </script>
                                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="price" value="{{ $event->Price*100 }}">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <input type="hidden" name="eventname" value="{{ $event->name }}">
                                <input type="hidden" name="location" value="{{ $event->location }}">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $events->links() }}
    </div>
</x-app-layout>
