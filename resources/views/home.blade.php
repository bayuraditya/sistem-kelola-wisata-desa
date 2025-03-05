@extends('layouts.guest.app')
@section('content')
<style>
     
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
    </style>

    <!-- Hero Section -->
    <section class="jumbotron bg-light py-5">
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row align-items-center">
                <!-- Kolom Kiri (Teks) -->
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="fw-bold">Explore the Beauty of Belalang Tourism</h1>
                    <p class="lead">Discover breathtaking destinations, exciting activities, and unforgettable experiences.</p>
                    <a href="#destinations" class="btn btn-success mt-3">Explore Now</a>
                </div>
                <!-- Kolom Kanan (Gambar) -->
                <div class="col-lg-6 text-center">
                    <img src="https://plus.unsplash.com/premium_photo-1729070677283-c16a03fe5287?q=80&w=2128&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded shadow-lg" alt="Tourism Image">
                </div>
            </div>
        </div>
    </section>

    <!-- Destinasi Wisata -->
    <section id="destinations" class="py-5">
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
            <div class="d-flex justify-content-center">
                <a href="/destinations">
                    <button class="btn btn-success btn-lg">See More Destination</button>
                </a>
            </div>

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
    <section id="kontak" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact</h2>
            <p class="text-center">Contact us for more information.</p>
            <div class="text-center">
                <a href="#" class="btn btn-success">Contact Us</a>
            </div>
        </div>
    </section>
       <!-- aos js -->
       <script>
        AOS.init();
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endsection