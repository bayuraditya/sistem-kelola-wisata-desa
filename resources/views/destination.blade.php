@extends('layouts.guest.menu-app')

@section('content')
    <!-- Hero Section -->
    <br><br><br><br>
    <br><br>
    <section >
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-7">
                    @if(isset($destination) && $destination->destinationImages->isNotEmpty())
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
                                        <img style="width: 100%; height: 550px; object-fit: cover; border-radius: 10px;" 
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
                <div class="col-md-5">
                    <h2 class="fw-bold">{{$destination->name}}</h2>
                    <p class="text-secondary" style="text-align: justify;">
                        {{$destination->description}}
                    </p>
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Location</strong></td>
                            <td>:</td>
                            <td>{{$destination->location}}</td>
                        </tr>
                        <tr>
                            <td><strong>Entry Fee</strong></td>
                            <td>:</td>
                            <td>Rp{{$destination->entry_fee}}</td>
                        </tr>
                        <tr>
                            <td><strong>Opening Time</strong></td>
                            <td>:</td>
                            <td>{{$destination->opening_time}}</td>
                        </tr>
                        <tr>
                            <td><strong>Closed Time</strong></td>
                            <td>:</td>
                            <td>{{$destination->closed_time}}</td>
                        </tr>
                        <tr>
                            <td><strong>Category</strong></td>
                            <td>:</td>
                            <td>{{$destination->category->name}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    
    <section style="background-color:">
        <div class="container"  >
            <h2 class="text-center mb-4">Activities</h2><br>
            <div class="row">
                @foreach($destination->activities as $a)
                <div class="col-md-4 mb-2">
                    @if(isset($a->image) && file_exists(public_path('images/' . $a->image)))
                        <img style="object-fit: cover; height: 300px; width: 400px;" 
                            src="{{ asset('images/' . $a->image) }}" 
                            class="card-img-top" 
                            alt="{{$a->name}}">
                    @else
                        <img style="object-fit: cover; height: 300px; width: 400px;" 
                            src="https://career.astra.co.id/static/media/image_not_available1.94c0c57d.png" 
                            class="card-img-top" 
                            alt="Default Destination Image">
                    @endif
                </div>
                <div class="col-md-8 mb-2 ">
                    <h4>{{$a->name}}</h4> <br>
                    <p style="text-align: justify;max-width:600px">{{$a->description}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
 <br><br>
    
    <section>
        <div class="container"  >
            <h2 class="text-center mb-4">Facilities</h2><br>
            <div class="row">
                @foreach($destination->facilities as $f)
                <div class="col-md-4 mb-2">
                    @if(isset($f->image) && file_exists(public_path('images/' . $f->image)))
                        <img style="object-fit: cover; height: 300px; width: 400px;" 
                            src="{{ asset('images/' . $f->image) }}" 
                            class="card-img-top" 
                            alt="{{$f->name}}">
                    @else
                        <img style="object-fit: cover; height: 300px; width: 400px;" 
                            src="https://career.astra.co.id/static/media/image_not_available1.94c0c57d.png" 
                            class="card-img-top" 
                            alt="Default Destination Image">
                    @endif
                </div>
                <div class="col-md-8 mb-2 ">
                    <h4>{{$f->name}}</h4> <br>
                    <p style="text-align: justify;max-width:600px">{{$f->description}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
 <br><br>
 <section>
    <div class="container text-center">
        <h2 class="mb-4">Social Media</h2>
        <ul class="d-flex list-unstyled justify-content-center gap-4">
            @if($destination->instagram)
                <li>
                    <a href="https://instagram.com/{{$destination->instagram}}" target="_blank" class="social-link">
                        <i class="fa-brands fa-instagram"></i>  {{$destination->instagram}}
                    </a>
                </li>
            @endif
            @if($destination->youtube)
                <li>
                    <a href="https://youtube.com/{{$destination->youtube}}" target="_blank" class="social-link">
                        <i class="fa-brands fa-youtube"></i>  {{$destination->youtube}}
                    </a>
                </li>
            @endif
       
            @if($destination->facebook)
                <li>
                    <a href="https://id-id.facebook.com/public/{{$destination->facebook}}" target="_blank" class="social-link">
                        <i class="fa-brands fa-facebook"></i>  {{$destination->facebook}}
                    </a>
                </li>
            @endif
            @if($destination->tiktok)
                <li>
                    <a href="https://tiktok.com/{{$destination->tiktok}}" target="_blank" class="social-link">
                        <i class="fa-brands fa-tiktok"></i> {{$destination->tiktok}}
                    </a>
                </li>
            @endif
            @if($destination->handphone_number)
                <li>
                    <a href="https://wa.me/{{$destination->handphone_number}}" class="social-link">
                        <i class="fa-brands fa-whatsapp"></i>
                        {{$destination->handphone_number}}
                    </a>
                </li>
            @endif
            @if($destination->email)
                <li>
                    <a href="mailto:{{$destination->email}}" class="social-link">
                        <i class="fa-solid fa-envelope"></i> {{$destination->email}}
                    </a>
                </li>
            @endif
        </ul>
    </div>
</section>
<style>.social-link {
    text-decoration: none;
    color: #333;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: color 0.3s ease-in-out;
}

.social-link i {
    font-size: 22px;
}

.social-link:hover {
    color: #007bff;
}
</style>
    <br><br>
    
   
@endsection
