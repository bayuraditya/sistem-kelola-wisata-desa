@extends('layouts.guest.menu-app')
@section('content')
    <br><br>
    <style>
        .clamp-text {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

    <section id="destinasi" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tourist Destination</h2>
            
            <div class="mb-4 ms-1">
                <input type="text" id="searchInput" class="form-control" style="width: 300px;" placeholder="Search destinations...">
            </div>
            
            <div class="row" id="destinationList">
                @foreach($destinations as $d)
                    <div class="col-md-4 destination-item d-flex">
                        <a href="/destination/{{$d->id}}" class="text-decoration-none w-100 m-2">
                            <div class="card ">
                                @if(isset($d->destinationImages[0]) && file_exists(public_path('images/' . $d->destinationImages[0]->image)))
                                    <img style="object-fit: cover;height: 230px;" src="{{ asset('images/' . $d->destinationImages[0]->image) }}" class="card-img-top" alt="{{$d->name}}">
                                @else
                                    <img style="object-fit: cover;height: 230px;" src="https://career.astra.co.id/static/media/image_not_available1.94c0c57d.png" class="card-img-top" alt="Default Destination Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$d->name}}</h5>
                                    <p class="card-text clamp-text">{{$d->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const destinationList = document.getElementById("destinationList");
        const destinationItems = document.querySelectorAll(".destination-item");

        // Buat elemen untuk pesan jika tidak ada hasil
        const noResultsMessage = document.createElement("div");
        noResultsMessage.classList.add("text-center", "mt-3");
        noResultsMessage.innerHTML = "<h5>No destinations found.</h5>";
        noResultsMessage.style.display = "none"; 
        destinationList.appendChild(noResultsMessage);

        searchInput.addEventListener("input", function () {
            const query = searchInput.value.toLowerCase();
            let hasResults = false;

            destinationItems.forEach(item => {
                const title = item.querySelector(".card-title").textContent.toLowerCase();

                if (title.includes(query)) {
                    item.style.display = "flex"; // Pakai "flex" agar tetap mengikuti Bootstrap Grid
                    hasResults = true;
                } else {
                    item.style.display = "none"; // Sembunyikan sepenuhnya
                }
            });

            // Tampilkan atau sembunyikan pesan "No destinations found."
            noResultsMessage.style.display = hasResults ? "none" : "block";
        });
    });
</script>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection
