<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restur: The Restaurant Management System</title>
    <link rel="shortcut icon" type="image/ico" href="{{'image/backend/logo.webp'}}">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="body">
<div class="container py-5">
    <section id="services">
        <div class="container services">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Restur: Restaurant Management System </h3>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <h2 class="container-title">Menu</h2>

                </div>

                <div class="col-6">
                    <div class="text-right">
                        <a href="{{URL::to('login')}}"><button class="btn btn-primary">Login</button></a>
                    </div>
                </div>
                <div class="col-12 services-container">
                    @php($s= 1)
                    @foreach($t->sortBy('dish_type') as $t)
                    <div class="col-md-4">
                        <!-- service box -->
                        <div class="service-box text-center color{{$s++}}">
                            <img class="rounded" src="{{asset('image/dish/'.$t->dish_image)}}" alt="UI/UX Designs" style="width: 250px; height: 150px;">
                            <h4 >{{$t->dish_name}}</h4>
                            <h5 class="mb-3 mt-0">{{$t->dish_type}}</h5>
                            <p class="mb-0">Price: {{$t->dish_price}}</p>
                        </div>
                    </div>
                        @if($s==4) @php($s =1) @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
