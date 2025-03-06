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
    <ul class="d-flex flex-wrap list-unstyled justify-content-center gap-3">
        @if($destination->instagram)
            <li>
                <a href="https://instagram.com/{{$destination->instagram}}" target="_blank" class="social-link d-flex align-items-center gap-2">
                    <i class="fa-brands fa-instagram fs-4"></i>  
                    <span class="d-none d-md-inline text-truncate">{{ $destination->instagram }}</span>
                </a>
            </li>
        @endif
        @if($destination->youtube)
            <li>
                <a href="https://youtube.com/{{$destination->youtube}}" target="_blank" class="social-link d-flex align-items-center gap-2">
                    <i class="fa-brands fa-youtube fs-4"></i>  
                    <span class="d-none d-md-inline text-truncate">{{ $destination->youtube }}</span>
                </a>
            </li>
        @endif
        @if($destination->facebook)
            <li>
                <a href="https://id-id.facebook.com/public/{{$destination->facebook}}" target="_blank" class="social-link d-flex align-items-center gap-2">
                    <i class="fa-brands fa-facebook fs-4"></i>  
                    <span class="d-none d-md-inline text-truncate">{{ $destination->facebook }}</span>
                </a>
            </li>
        @endif
        @if($destination->tiktok)
            <li>
                <a href="https://tiktok.com/{{$destination->tiktok}}" target="_blank" class="social-link d-flex align-items-center gap-2">
                    <i class="fa-brands fa-tiktok fs-4"></i>  
                    <span class="d-none d-md-inline text-truncate">{{ $destination->tiktok }}</span>
                </a>
            </li>
        @endif
        @if($destination->handphone_number)
            <li>
                <a href="https://wa.me/{{$destination->handphone_number}}" class="social-link d-flex align-items-center gap-2">
                    <i class="fa-brands fa-whatsapp fs-4"></i>  
                    <span class="d-none d-md-inline text-truncate">{{ $destination->handphone_number }}</span>
                </a>
            </li>
        @endif
        @if($destination->email)
            <li>
                <a href="mailto:{{$destination->email}}" class="social-link d-flex align-items-center gap-2">
                    <i class="fa-solid fa-envelope fs-4"></i>  
                    <span class="d-none d-md-inline text-truncate">{{ $destination->email }}</span>
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
    <section>
        <div class="container text-center">
            <div class="container ">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Give a Review
            </button><br><br>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Give a Review</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="/addReview/{{$destination->id}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Your Rating</label>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                        <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                        <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                        <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                        <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                    </div>
                </div>
                <style>
                    .rating {
                        display: flex;
                        flex-direction: row-reverse;
                        justify-content: center;
                        gap: 5px;
                    }

                    .rating input {
                        display: none;
                    }

                    .rating label {
                        font-size: 30px;
                        color: gray;
                        cursor: pointer;
                        transition: color 0.3s;
                    }
                    .rating input:checked ~ label,
                    .rating label:hover,
                    .rating label:hover ~ label {
                        color: gold;
                    }
                </style>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Review</label>
            <textarea class="form-control" id="review" name="review"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    
    </div>
  </div>
</div>
                <!-- <h2 class="text-center mb-4">Reviews</h2> -->
                <div class="card shadow-sm p-4">
                    @foreach($destination->reviews as $r)
                        @if($r->status == 'accepted')
                            <div class="mb-3 border-bottom pb-3">
                                <h4>{{ $r->name }}</h4>
                                <div >
                                    <h4 class="text-warning" style="display: inline;">
                                        {!! str_repeat('<span>★</span>', $r->rating) !!}
                                    </h4>
                                    <h4 class="text-warning" style="display: inline;margin-left:-5px" >
                                        {!! str_repeat('<span>☆</span>', 5 - $r->rating) !!}
                                    </h4>
                                </div>

                                <p>{{ $r->review }}</p>
                            </div>
             
                        @endif
                    @endforeach
                </div>


    </div>
        </div>
    </section>
   <br>
   <br>
   <br>
@endsection
