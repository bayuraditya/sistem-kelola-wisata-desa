@extends('layouts.guest.menu-app')

@section('content')
    <!-- Hero Section -->
    <br><br><br><br>
    <br><br>
    <section>
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-7 col-12">
                    @if(isset($destination) && $destination->destinationImages->isNotEmpty())
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
                            <div class="carousel-inner">
                                @foreach($destination->destinationImages as $index => $i)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img class="img-fluid" style="height: 550px; object-fit: cover; border-radius: 10px;" 
                                             src="{{ asset('images/' . $i->image) }}" alt="{{ $i->image }}">
                                    </div>
                                @endforeach
                            </div>
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
                <div class="col-md-5 col-12">
                    <h2 class="fw-bold">{{ $destination->name }}</h2>
                    <p class="text-secondary description" style="text-align: justify;">{{ $destination->description }}</p>
                    <table class="table table-borderless">
                        <tr><td><strong>Location</strong></td><td>:</td><td>{{ $destination->location }}</td></tr>
                        <tr><td><strong>Entry Fee</strong></td><td>:</td><td>Rp{{ $destination->entry_fee }}</td></tr>
                        <tr><td><strong>Opening Time</strong></td><td>:</td><td>{{ $destination->opening_time }}</td></tr>
                        <tr><td><strong>Closed Time</strong></td><td>:</td><td>{{ $destination->closed_time }}</td></tr>
                        <tr><td><strong>Category</strong></td><td>:</td><td>{{ $destination->category->name }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <br><br>

    <!-- Activities -->
    <section>
        <div class="container">
            <h2 class="text-center mb-4">Activities</h2><br>
            <div class="row">
                @foreach($destination->activities as $a)
                    <div class="col-md-4 col-12 mb-2">
                        <img class="img-fluid" style="object-fit: cover; height: 300px;" 
                             src="{{ file_exists(public_path('images/' . $a->image)) ? asset('images/' . $a->image) : 'https://career.astra.co.id/static/media/image_not_available1.94c0c57d.png' }}" 
                             alt="{{ $a->name }}">
                    </div>
                    <div class="col-md-8 col-12 mb-2">
                        <h4>{{ $a->name }}</h4>
                        <p class="description" style="text-align: justify;">{{ $a->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <br><br>

    <!-- Facilities -->
    <section>
        <div class="container">
            <h2 class="text-center mb-4">Facilities</h2><br>
            <div class="row">
                @foreach($destination->facilities as $f)
                    <div class="col-md-4 col-12 mb-2">
                        <img class="img-fluid" style="object-fit: cover; height: 300px;" 
                             src="{{ file_exists(public_path('images/' . $f->image)) ? asset('images/' . $f->image) : 'https://career.astra.co.id/static/media/image_not_available1.94c0c57d.png' }}" 
                             alt="{{ $f->name }}">
                    </div>
                    <div class="col-md-8 col-12 mb-2">
                        <h4>{{ $f->name }}</h4>
                        <p class="description" style="text-align: justify;">{{ $f->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <br><br>
    <style>
        .description, p, td {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        @media (max-width: 768px) {
            .carousel-inner img { height: 250px !important; }
            .card-img-top { height: 200px !important; }
        }
    </style>
@endsection
