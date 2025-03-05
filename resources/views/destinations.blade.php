@extends('layouts.guest.menu-app')
@section('content')
    <!-- Hero Section -->
  <br><br>

    <!-- Destinasi Wisata -->
    <section id="destinasi" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tourist Destination </h2>
            <div class="row">
            @foreach($destinations as $d)
                <div class="col-md-4">
                    <a href="/destination/{{$d->id}}" class="text-decoration-none">
                        <div class="card m-2">
                            @if(isset($d->destinationImages[0]) && file_exists(public_path('images/' . $d->destinationImages[0]->image)))
                                <img style="object-fit: cover;height: 230px;" src="{{ asset('images/' . $d->destinationImages[0]->image) }}" class="card-img-top" alt="{{$d->name}}">
                            @else
                                <img style="object-fit: cover;height: 230px;" src="https://career.astra.co.id/static/media/image_not_available1.94c0c57d.png" class="card-img-top" alt="Default Destination Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$d->name}}</h5>
                                <p class="card-text">{{$d->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

                <style>
                    .card {
                        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                        border-radius: 10px; /* Membuat sudut lebih halus */
                    }

                    .card:hover {
                        transform: scale(1.05); /* Zoom sedikit saat hover */
                        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); /* Efek bayangan lebih dalam */
                    }
                </style>
            </div>
        </div>
    </section>

    <!-- Kontak -->

       <!-- aos js -->
       <script>
        AOS.init();
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endsection