<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ADD EVENT
        </h2>
    </x-slot>
   
    <div class="mt-3 d-flex align-items-center justify-content-center">
     <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
    <div class="container-fluid ">

        <form method="POST" action="/cate/{{ $cates->id }}/addevent/create/add" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
        
            <div class="form-group">
                <label for="opening">Opening</label>
                <input type="text" class="form-control" id="opening" name="opening" required>
            </div>
        
            <div class="form-group">
                <label for="contact_info">Contact Info</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info" required>
            </div>
        
            <div class="mb-3">
                <div class="row gx-3">
                    <div class="col-xs-12 cl-sm-12 col-md-6">
                        <label for="ImageInput" class="form-label">Image</label>
                        <input name="image"  type="file" class="form-control" id="ImageInput" aria-describedby="dateHelp">
                        @error('Image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
</div>
</div>
</div>
</div>
</x-admin-layout>