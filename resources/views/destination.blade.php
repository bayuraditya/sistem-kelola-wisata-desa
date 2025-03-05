@extends('layouts.guest.menu-app')

@section('content')
    <!-- Hero Section -->
    <br><br><br><br>
    <br><br>
    <section>
    <div class="container">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
            @if(isset($destination) && $destination->destinationImages->isNotEmpty())
                <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        @foreach($destination->destinationImages as $index => $i)
                            <button type="button" data-bs-target="#carouselExampleIndicators" 
                                    data-bs-slide-to="{{ $index }}" 
                                    class="{{ $loop->first ? 'active' : '' }}" 
                                    aria-current="{{ $loop->first ? 'true' : 'false' }}" 
                                    aria-label="Slide {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>

                    <!-- Carousel Images -->
                    <div class="carousel-inner">
                        @foreach($destination->destinationImages as $index => $i)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;" 
                                     src="{{ asset('images/' . $i->image) }}" 
                                     class="d-block " 
                                     alt="{{ $i->image }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p class="text-center">Tidak ada gambar tersedia.</p>
            @endif
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
            <h2 class="fw-bold">{{$destination->name}}</h2>
            <p class="text-secondary" style="text-align: justify;">
            {{$destination->description}}
            </p>
            <ul class="list-unstyled">
                <li><strong>Location:</strong>{{$destination->location}}</li>
                <li><strong>Entry Fee:</strong>{{$destination->entry_fee}}</li>
                <li><strong>Opening Time:</strong>{{$destination->opening_time}}</li>
                <li><strong>Closed Time:</strong> {{$destination->closed_time}}</li>
            </ul>
            <a href="#" class="btn btn-success mt-3">Book Now</a>
            </div>
        </div>
    </div>
</section>

<br>
    <br>
    <br>
    <br>
    <br>

    <section>
        <div class="container">
            @if(isset($destination) && $destination->destinationImages->isNotEmpty())
                <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        @foreach($destination->destinationImages as $index => $i)
                            <button type="button" data-bs-target="#carouselExampleIndicators" 
                                    data-bs-slide-to="{{ $index }}" 
                                    class="{{ $loop->first ? 'active' : '' }}" 
                                    aria-current="{{ $loop->first ? 'true' : 'false' }}" 
                                    aria-label="Slide {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>

                    <!-- Carousel Images -->
                    <div class="carousel-inner">
                        @foreach($destination->destinationImages as $index => $i)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img style="object-fit: cover;" 
                                     src="{{ asset('images/' . $i->image) }}" 
                                     class="d-block " 
                                     alt="{{ $i->image }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p class="text-center">Tidak ada gambar tersedia.</p>
            @endif
        </div>
    </section>
  
    <section class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="fw-bold">Pantai Kuta</h2>
            <p class="text-muted"><i class="bi bi-geo-alt"></i> Bali, Indonesia</p>
            <p class="lead">Pantai Kuta adalah salah satu destinasi wisata paling populer di Bali yang terkenal dengan pasir putihnya, ombak yang cocok untuk berselancar, dan pemandangan matahari terbenam yang indah.</p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <h4 class="text-warning"><i class="bi bi-star-fill"></i> 4.7/5</h4>
            <p class="text-muted">Dari 1,200 ulasan</p>
        </div>
    </div>
</section>
<section class="container py-5">
    <h3 class="fw-bold text-center">Fasilitas & Kegiatan</h3>
    <div class="row text-center mt-4">
        <div class="col-md-3">
            <i class="bi bi-wifi h2 text-success"></i>
            <p>Wi-Fi Gratis</p>
        </div>
        <div class="col-md-3">
            <i class="bi bi-umbrella h2 text-success"></i>
            <p>Pantai Indah</p>
        </div>
        <div class="col-md-3">
            <i class="bi bi-cup h2 text-success"></i>
            <p>Restoran</p>
        </div>
        <div class="col-md-3">
            <i class="bi bi-bicycle h2 text-success"></i>
            <p>Aktivitas Outdoor</p>
        </div>
    </div>
</section>

<br><br>
    <section> 
        <div class="container  text-center">
            <h2 class="fw-bolder">Activities</h2>

        </div>
    </section>
    <br><br><br><br><br><br><br><br><br><br>
    
@endsection
