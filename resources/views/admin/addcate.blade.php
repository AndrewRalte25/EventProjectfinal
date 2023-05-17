<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ADD CATEGORY
        </h2>
    </x-slot>
   
    <div class="mt-3 d-flex align-items-center justify-content-center">
     <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
    <div class="container-fluid ">

<form action="/cateadd" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="mb-3">
                <label for="nameInput" class="form-label">TYPE</label>
                <input name="type" value="{{ old('name') }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                @error('type')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </div>
</form>  
</div>
</div>
</div>
</div>
</x-admin-layout>