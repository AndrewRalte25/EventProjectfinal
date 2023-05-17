<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="card border">
        <div class="card-body mx-4">
            <div class="container">
                <p class="my-3 mx-5" style="font-size: 35px;">TICKET</p>
                <p class="my-3 mx-5" style="font-size: 30px;">Thank you for Booking</p>
                <div class="row">
                    <ul class="list-unstyled">
                        <p class="my-3 mx-5" style="font-size: 20px;">Name: <span class="text-black" style="font-family: Candara">{{ Auth::user()->name }}</span></p>
                        <p class="my-3 mx-5" style="font-size: 20px;">Email:<span class="text-black" style="font-family: Candara">{{ Auth::user()->email }}</span></p>
                    </ul>
                    <hr>
                    <p class="my-3 mx-5" style="font-size: 20px;">Event Name:<span class="text-black" style="font-family: Candara">{{ $order->eventname }}</span></p>
                    <p class="my-3 mx-5" style="font-size: 20px;">Tax:Rs<span class="text-black" style="font-family: Candara">{{ $order->tax }}</span></p>
                    <p class="my-3 mx-5" style="font-size: 20px;">Event Price:Rs<span class="text-black" style="font-family: Candara">{{ $order->price }}</span></p>
                    <p class="my-3 mx-5" style="font-size: 20px;">Payment Mode:<span class="text-black" style="font-family: Candara">{{ $order->mode }}</span></p>
                    <div class="col-xl-2">
                        <p class="my-3 mx-5" style="font-size: 20px;">Ticket ID</p>
                        <p class="float-end">{{ $order->rzp_id }}</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
