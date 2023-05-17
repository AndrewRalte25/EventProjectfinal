    <x-app-layout>
        <x-slot name="header" class="container position-absolute">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Welcome!!') }} {{ Auth::user()->name }}
            </h2>
        </x-slot>
        
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">            
                        @foreach($cates as $category)
                        <a class="dropdown-item" href="{{ '/category/'.$category->id }}">{{ $category->TYPE }}</a>
        
                        @endforeach
                    </div>
                </div>
            </div>
            
            
            <!-- Image carousel -->
            <div class="mx-auto my-5" style="max-width: 100%;">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($events as $event) 
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img class="d-block w-100" style="height: 200px; object-fit: cover;" src="{{ asset($event->Image) }}" alt="{{ $event->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.carousel').carousel({
                    interval: 300 // change the interval here to set the time in milliseconds
                })
            });
        </script>
    </x-app-layout>
