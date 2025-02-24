@extends('layouts.admin.app')
@section('content')

<div class="page-heading">
    <h3>Destination</h3>
</div>

<div class="card">
    <div class="card-body">
        <br>
        @if (session('success'))
            <div class="alert-success alert  alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDestinationModal">
            Add Destination
        </button>

        <div class="modal fade" id="addDestinationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Destination </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="destination/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>
                            <div class="mb-3">
                                <label for="entry_fee" class="form-label">Entry Fee</label>
                                <input type="number" class="form-control" id="entry_fee" name="entry_fee">
                            </div>
                            
                            <div class="mb-3">
                                <label for="opening_time" class="form-label">Opening Time</label>
                                <input type="time" class="form-control" id="opening_time" name="opening_time">
                            </div>
                            
                            <div class="mb-3">
                                <label for="closed_time" class="form-label">Closed Time</label>
                                <input type="time" class="form-control" id="closed_time" name="closed_time">
                            </div>
                            
                            <div class="mb-3">
                                <label for="handphone_number" class="form-label">Handphone Number</label>
                                <input type="number" class="form-control" id="handphone_number" name="handphone_number">
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram">
                            </div>
                            
                            <div class="mb-3">
                                <label for="tiktok" class="form-label">Tiktok</label>
                                <input type="text" class="form-control" id="tiktok" name="tiktok">
                            </div>
                            
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook">
                            </div>
                            
                            <div class="mb-3">
                                <label for="youtube" class="form-label">Youtube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube">
                            </div>
                        
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category" id="category">
                                    @foreach($categories as $c) 
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Destination Image</label>
                                <input class="form-control" type="file" name="image[]" id="images" accept="image/*" multiple>
                            </div>
                            <hr>
                         
                            <div id="facilities-container">
                                <h5>Facilities</h5>
                                <div class="facility-item">
                                    <label class="form-label">Facility 1</label>
                                    <input type="text" class="form-control" name="facility[0][name]" required>

                                    <label class="form-label">Facility 1 Description</label>
                                    <input type="text" class="form-control" name="facility[0][description]">

                                    <label class="form-label mt-2">Facility 1 Image</label>
                                    <input type="file" class="form-control" name="facility[0][image]">

                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-facility">Delete</button>
                                </div>
                            </div>
                            <button type="button" id="add-facility-btn" class="btn btn-primary mt-3">Add More Facility</button>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    let facilitiesContainer = document.getElementById("facilities-container");
                                    let addFacilityBtn = document.getElementById("add-facility-btn");

                                    function updateFacilityLabels() {
                                        let facilityItems = document.querySelectorAll(".facility-item");
                                        facilityItems.forEach((item, index) => {
                                            let labels = item.querySelectorAll("label");
                                            labels[0].innerText = `Facility ${index + 1}`;
                                            labels[1].innerText = `Facility ${index + 1} Description`;
                                            labels[2].innerText = `Facility ${index + 1} Image`;

                                            let inputs = item.querySelectorAll("input");
                                            inputs[0].name = `facility[${index}][name]`;
                                            inputs[1].name = `facility[${index}][description]`;
                                            inputs[2].name = `facility[${index}][image]`;
                                        });
                                    }

                                    addFacilityBtn.addEventListener("click", function () {
                                        let facilityCount = document.querySelectorAll(".facility-item").length;

                                        let newFacilityDiv = document.createElement("div");
                                        newFacilityDiv.classList.add("facility-item", "mt-3");

                                        newFacilityDiv.innerHTML = `
                                            <label class="form-label">Facility ${facilityCount + 1}</label>
                                            <input type="text" class="form-control" name="facility[${facilityCount}][name]" required>

                                            <label class="form-label">Facility ${facilityCount + 1} Description</label>
                                            <input type="text" class="form-control" name="facility[${facilityCount}][description]" >

                                            <label class="form-label mt-2">Facility ${facilityCount + 1} Image</label>
                                            <input type="file" class="form-control" name="facility[${facilityCount}][image]" >

                                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-facility">Delete</button>
                                        `;

                                        facilitiesContainer.appendChild(newFacilityDiv);
                                        updateFacilityLabels();
                                    });

                                    facilitiesContainer.addEventListener("click", function (event) {
                                        if (event.target.classList.contains("remove-facility")) {
                                            event.target.parentElement.remove();
                                            updateFacilityLabels();
                                        }
                                    });
                                });
                            </script>



                            <hr>
                            <div id="activities-container">
    <h5>Activities</h5>
    <div class="activity-item">
        <label class="form-label">Activity 1</label>
        <input type="text" class="form-control" name="activity[0][name]" required>

        <label class="form-label">Activity 1 Description</label>
        <input type="text" class="form-control" name="activity[0][description]">

        <label class="form-label mt-2">Activity 1 Image</label>
        <input type="file" class="form-control" name="activity[0][image]">

        <button type="button" class="btn btn-danger btn-sm mt-2 remove-activity">Delete</button>
    </div>
</div>
<button type="button" id="add-activity-btn" class="btn btn-primary mt-3">Add More Activity</button>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let activitiesContainer = document.getElementById("activities-container");
        let addActivityBtn = document.getElementById("add-activity-btn");

        function updateActivityLabels() {
            let activityItems = document.querySelectorAll(".activity-item");
            activityItems.forEach((item, index) => {
                let labels = item.querySelectorAll("label");
                labels[0].innerText = `Activity ${index + 1}`;
                labels[1].innerText = `Activity ${index + 1} Description`;
                labels[2].innerText = `Activity ${index + 1} Image`;

                let inputs = item.querySelectorAll("input");
                inputs[0].name = `activity[${index}][name]`;
                inputs[1].name = `activity[${index}][description]`;
                inputs[2].name = `activity[${index}][image]`;
            });
        }

        addActivityBtn.addEventListener("click", function () {
            let activityCount = document.querySelectorAll(".activity-item").length;

            let newActivityDiv = document.createElement("div");
            newActivityDiv.classList.add("activity-item", "mt-3");

            newActivityDiv.innerHTML = `
                <label class="form-label">Activity ${activityCount + 1}</label>
                <input type="text" class="form-control" name="activity[${activityCount}][name]" required>

                <label class="form-label">Activity ${activityCount + 1} Description</label>
                <input type="text" class="form-control" name="activity[${activityCount}][description]" >

                <label class="form-label mt-2">Activity ${activityCount + 1} Image</label>
                <input type="file" class="form-control" name="activity[${activityCount}][image]" >

                <button type="button" class="btn btn-danger btn-sm mt-2 remove-activity">Delete</button>
            `;

            activitiesContainer.appendChild(newActivityDiv);
            updateActivityLabels();
        });

        activitiesContainer.addEventListener("click", function (event) {
            if (event.target.classList.contains("remove-activity")) {
                event.target.parentElement.remove();
                updateActivityLabels();
            }
        });
    });
</script>

                            <br><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="tableDestination">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Location</td>
                            <td>Entry Fee</td>
                            <td>Opening Time</td>
                            <td>Closed Time</td>
                            <td>Handphone Number</td>
                            <td>Email</td>
                            <td>Instagram</td>
                            <td>Tiktok</td>
                            <td>Facebook</td>
                            <td>Youtube</td>
                            <td>Category</td>
                            <td>Created By</td>
                            <td>Facilities</td>
                            <td>Images</td>
                            <td>Activities</td>
                            <td>Reviews</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinations as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->description}}</td>
                                <td>{{$d->location}}</td>
                                <td>{{$d->entry_fee}}</td>
                                <td>{{$d->opening_time}}</td>
                                <td>{{$d->closed_time}}</td>
                                <td>{{$d->handphone_number}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->instagram}}</td>
                                <td>{{$d->tiktok}}</td>
                                <td>{{$d->facebook}}</td>
                                <td>{{$d->youtube}}</td>
                                <td>{{ optional($d->category)->name ?? '' }}</td>
                                <td>{{$d->user->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#facilities{{$d->id}}">
                                        Facilities
                                    </button>

                                    <div class="modal fade" id="facilities{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$d->name}} Facilities</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td>No</td>
                                                                    <td>Facility</td>
                                                                    <td>Description</td>
                                                                    <td>Image</td>
                                                                </tr>
                                                            </thead>    
                                                            <tbody>
                                                                @foreach($d->facilities as $f)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$f->name}}</td>
                                                                    <td>{{$f->description}}</td>
                                                                    <td>                                     
                                                                        <img src="{{ asset('images/' . $f->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>        
                                                    </div>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#images{{$d->id}}">
                                        Images
                                    </button>

                                    <div class="modal fade" id="images{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$d->name}} Images</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach($d->destinationImages as $i)
                                                        <img src="{{ asset('images/' . $i->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activities{{$d->id}}">
                                        Activities
                                    </button>

                                    <div class="modal fade" id="activities{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$d->name}} Activities</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td>No</td>
                                                                    <td>Activity</td>
                                                                    <td>Description</td>
                                                                    <td>Image</td>
                                                                </tr>
                                                            </thead>    
                                                            <tbody>
                                                                @foreach($d->activities as $a)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{$a->name}}</td>
                                                                        <td>{{$a->description}}</td>
                                                                        <td>                                     
                                                                            <img src="{{ asset('images/' . $a->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviews{{$d->id}}">
                                        Reviews
                                    </button>

                                    <div class="modal fade" id="reviews{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$d->name}} Reviews</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td>No</td>
                                                                    <td>Email</td>
                                                                    <td>Name</td>
                                                                    <td>Rating</td>
                                                                    <td>Reviews</td>
                                                                </tr>
                                                            </thead>    
                                                            <tbody>
                                                                @foreach($d->reviews as $r)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{$r->email}}</td>
                                                                        <td>{{$r->name}}</td>
                                                                        <td>{{$r->rating}}</td>
                                                                        <td>{{$r->review}}</td>

                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDestination{{$d->id}}">
                                        Edit
                                    </button>
                                                            
                                    <div class="modal fade" id="editDestination{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Destination {{$d->name}} </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="destination/{{$d->id}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{$d->name}}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <input type="text" class="form-control" id="description" name="description" value="{{$d->description}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="location" class="form-label">Location</label>
                                                            <input type="text" class="form-control" id="location" name="location" value="{{$d->location}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="entry_fee" class="form-label">Entry Fee</label>
                                                            <input type="number" class="form-control" id="entry_fee" name="entry_fee" value="{{$d->entry_fee}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="opening_time" class="form-label">Opening Time</label>
                                                            <input type="time" class="form-control" id="opening_time" name="opening_time" value="{{$d->opening_time}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="closed_time" class="form-label">Closed Time</label>
                                                            <input type="time" class="form-control" id="closed_time" name="closed_time" value="{{$d->closed_time}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="handphone_number" class="form-label">Handphone Number</label>
                                                            <input type="number" class="form-control" id="handphone_number" name="handphone_number" value="{{$d->handphone_number}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="{{$d->email}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="instagram" class="form-label">Instagram</label>
                                                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{$d->instagram}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="tiktok" class="form-label">Tiktok</label>
                                                            <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{$d->tiktok}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="facebook" class="form-label">Facebook</label>
                                                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{$d->facebook}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="youtube" class="form-label">Youtube</label>
                                                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{$d->youtube}}">
                                                        </div>
                                                    
                                                        <div class="mb-3">
                                                            <label for="category" class="form-label">Category</label>
                                                            <select class="form-select" name="category" id="category">
                                                                @foreach($categories as $c) 
                                                                    <option value="{{$c->id}}"
                                                                        @if($c->id == $d->category_id)
                                                                            selected
                                                                        @endif
                                                                    >{{$c->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>
                                                        <!--  -->
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Destination Image</label><br>
                                                            @foreach($d->destinationImages ?? [] as $di)
                                                                <img src="{{ asset('images/' . $di->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                                                            @endforeach
                                                            <input class="form-control" type="file" name="image[]" id="images" accept="image/*" multiple>
                                                        </div>
                                                        <hr>
                                                        <div id="editFacilities-container">
                                                            <h5>Facilities</h5>
                                                            @foreach($d->facilities ?? [] as $indexEF => $ef)
                                                                <div class="editFacility-item{{$ef->id}}">
                                                                    <label class="form-label">Facility {{$indexEF + 1}}</label>
                                                                    <input type="text" class="form-control" name="facility[{{$indexEF}}][name]" value="{{$ef->name}}" required>

                                                                    <label class="form-label">Facility {{$indexEF + 1}} Description</label>
                                                                    <input type="text" class="form-control" name="facility[{{$indexEF}}][description]" value="{{$ef->description}}">

                                                                    <label class="form-label mt-2">Facility {{$indexEF + 1}} Image</label><br>
                                                                    <img src="{{ asset('images/' . $ef->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                                                                    {{$ef->image}}
                                                                    <input type="file" class="form-control" name="facility[{{$indexEF}}][image]">

                                                                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-editFacility">Delete</button>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button type="button" id="add-editFacility-btn" class="btn btn-primary mt-3">Add More Facility</button>
                                                            <script>
                                                                document.addEventListener("DOMContentLoaded", function () {
                                                                    let editFacilitiesContainer{{ $d->id }} = document.getElementById("editFacilities-container-{{ $d->id }}");
                                                                    let addEditFacilityBtn{{ $d->id }} = document.getElementById("add-editFacility-btn-{{ $d->id }}");
                                                                    let editFacilityCount{{ $d->id }} = {{ count($d->facilities ?? []) }};

                                                                    if (addEditFacilityBtn{{ $d->id }}) { // Check if the button exists
                                                                        addEditFacilityBtn{{ $d->id }}.addEventListener("click", function () {
                                                                            let newEditFacilityDiv{{ $d->id }} = document.createElement("div");
                                                                            newEditFacilityDiv{{ $d->id }}.classList.add("editFacility-item", "mt-3");

                                                                            newEditFacilityDiv{{ $d->id }}.innerHTML = `
                                                                                <label class="form-label">Facility ${editFacilityCount{{ $d->id }} + 1}</label>
                                                                                <input type="text" class="form-control" name="facility[${editFacilityCount{{ $d->id }}}][name]" required>

                                                                                <label class="form-label">Facility ${editFacilityCount{{ $d->id }} + 1} Description</label>
                                                                                <input type="text" class="form-control" name="facility[${editFacilityCount{{ $d->id }}}][description]">

                                                                                <label class="form-label mt-2">Facility ${editFacilityCount{{ $d->id }} + 1} Image</label>
                                                                                <input type="file" class="form-control" name="facility[${editFacilityCount{{ $d->id }}}][image]">

                                                                                <button type="button" class="btn btn-danger btn-sm mt-2 remove-editFacility">Delete</button>
                                                                            `;

                                                                            editFacilitiesContainer{{ $d->id }}.appendChild(newEditFacilityDiv{{ $d->id }});
                                                                            editFacilityCount{{ $d->id }}++;

                                                                            newEditFacilityDiv{{ $d->id }}.querySelector(".remove-editFacility").addEventListener("click", function () {
                                                                                editFacilitiesContainer{{ $d->id }}.removeChild(newEditFacilityDiv{{ $d->id }});
                                                                            });
                                                                        });
                                                                    }

                                                                    if (editFacilitiesContainer{{ $d->id }}) { //Check if container exists
                                                                        editFacilitiesContainer{{ $d->id }}.querySelectorAll(".remove-editFacility").forEach(function (button) {
                                                                            button.addEventListener("click", function (event) {
                                                                                const facilityDiv = event.target.closest(".editFacility-item");
                                                                                editFacilitiesContainer{{ $d->id }}.removeChild(facilityDiv);
                                                                            });
                                                                        });
                                                                    }
                                                                });
                                                            </script>
                                                            <hr>
                                                        <div id="activities-container">
                                                            <h5>Activities</h5>
                                                            <div class="activity-item">
                                                                <label for="editActivity0-name" class="form-label">Activity 1</label>
                                                                <input type="text" class="form-control" id="editActivity0-name" name="editActivity[0][name]" required>

                                                                <label for="editActivity0-description" class="form-label">Activity 1 Description</label>
                                                                <input type="text" class="form-control" id="editActivity0-description" name="editActivity[0][description]">
                                                            
                                                                <label for="editActivity0-image" class="form-label mt-2">Activity 1 Image</label>
                                                                <input type="file" class="form-control" id="editActivity0-image" name="editActivity[0][image]">
                                                            </div>
                                                        </div>
                                                        <button type="button" id="add-activity-btn" class="btn btn-primary mt-3">Add More Activity</button>

                                            
                                                        <br><br>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('admin.destination.destroy',['id' => $d->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input onclick="return confirm('Are you sure you want delete destination {{ $d->name }} ?')" type="submit" class="btn btn-danger" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS (CDN) -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#tableDestination').DataTable();
    });
</script>


@endsection