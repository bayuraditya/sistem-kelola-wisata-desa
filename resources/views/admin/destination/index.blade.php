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
                                <!-- <textarea class="form-control" id="description" name="description"></textarea> -->
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
                                <input type="text" class="form-control" id="handphone_number" name="handphone_number">
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
                                    <input type="text" class="form-control" name="facility[0][description]" required>

                                    <label class="form-label mt-2">Facility 1 Image</label>
                                    <input type="file" class="form-control" name="facility[0][image]" accept="image/*">

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
                                            <input type="text" class="form-control" name="facility[${facilityCount}][description]" required>

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
        <input type="text" class="form-control" name="activity[0][description]" required>

        <label class="form-label mt-2">Activity 1 Image</label>
        <input type="file" class="form-control" name="activity[0][image]" accept="image/*">

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
                <input type="text" class="form-control" name="activity[${activityCount}][description]" required>

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
        <style>     
    


        </style>
        <br><br>
            <div class="table-responsive">
                <table class="table    " id="tableDestination">
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
                            
                            <td>Category</td>
                            <td>Created By</td>
                            <td>Social Media</td>
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
                                <td >{{$d->name}}</td>
                                <td style="  max-width: 400px; /* Sesuaikan dengan kebutuhan */
                                            overflow: hidden;
                                            text-overflow: ellipsis; /* Tambahkan ... jika teks terpotong */
                                            white-space: nowrap; /* Hindari pemisahan baris */">
                                    {{$d->description}} <br>
                                    @if(strlen($d->description) > 50)
                                    <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#desc{{$d->id}}">
                                        Read More
                                    </button>
                                  
                                    @endif
                                
                                </td>
                                <td style="  max-width: 400px;">{{$d->location}}</td>
                                <td >{{$d->entry_fee}}</td>
                                <td >{{$d->opening_time}}</td>
                                <td >{{$d->closed_time}}</td>
                                <td >{{$d->handphone_number}}</td>
                                <td >{{$d->email}}</td>
                           
                                <td>{{ optional($d->category)->name ?? '' }}</td>
                                <td>{{$d->user->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#socialMedia{{$d->id}}">
                                        Social Media
                                    </button>

                                    <div class="modal fade" id="socialMedia{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$d->name}} Social Media</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td>Social Media</td>
                                                                    <td>Username</td>
                                                                </tr>
                                                            </thead>    
                                                            <tbody>
                                                                <tr>
                                                                    <td>Instagram</td>
                                                                    <td>{{$d->instagram}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Facebook</td>
                                                                    <td>{{$d->facebook}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tiktok</td>
                                                                    <td>{{$d->tiktok}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Youtube</td>
                                                                    <td>{{$d->youtube}}</td>
                                                                </tr>
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
                                         
                                                <a href="/admin/destination/{{$d->id}}/facility/create" type="button" class="btn btn-primary">Add Facility</a>
                                                <br><br>

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td>No</td>
                                                                    <td>Facility</td>
                                                                    <td>Description</td>
                                                                    <td>Image</td>
                                                                    <td>Action</td>
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
                                                                    <td>
                                                                        <div class="d-flex gap-2">
                                                                            <a href="/admin/destination/{{$d->id}}/facility/{{$f->id}}" type="button" class="btn btn-warning">Edit</a>
                                                                            <form action="/admin/destination/{{$d->id}}/facility/{{$f->id}}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <input onclick="return confirm('Are you sure you want delete {{$f->name}} ?')" 
                                                                                    type="submit" class="btn btn-danger" value="DELETE">
                                                                            </form>
                                                                        </div>
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



                                    

                                    <div class="modal fade" id="addFacility{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$d->name}} Social Media</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <form action="/admin/destination/facility/store" method="post">
                                                            @csrf
                                                                  
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="name" name="facilityName">
                                                            </div>
                                                        
                                                           
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Image</label>
                                                                <input class="form-control" type="file" name="facilityImage" id="images" accept="image/*" >
                                                            </div>
                                                        </form>
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
                                                <a href="/admin/destination/{{$d->id}}/facility/create" type="button" class="btn btn-primary">Add Facility</a>
<br><br>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td>No</td>
                                                                    <td>Activity</td>
                                                                    <td>Description</td>
                                                                    <td>Image</td>
                                                                    <td>Action</td>
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
                                                                        <td>
                                                                            <div class="d-flex gap-2">
                                                                                <a href="/admin/destination/{{$d->id}}/activity/{{$a->id}}" type="button" class="btn btn-warning">Edit</a>
                                                                                <form action="/admin/destination/{{$d->id}}/activity/{{$a->id}}" method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <input onclick="return confirm('Are you sure you want delete {{$a->name}} ?')" 
                                                                                        type="submit" class="btn btn-danger" value="DELETE">
                                                                                </form>
                                                                            </div>
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
                                                                    <td>Status</td>
                                                                    <td>Edit</td>
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
                                                                        <td
                                                                        @if($r->status == 'accepted')
                                                                            class="text-success"
                                                                        @elseif($r->status == 'declined')
                                                                            class="text-danger"
                                                                        @elseif($r->status == 'pending')
                                                                            class="text-warning"
                                                                        @endif
                                                                        >{{$r->status}}</td>
                                                                        <td>
                                                                            <form action="/admin/review/{{$r->id}}" method="post">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <select name="status" class="form-select" aria-label="Default select example">
                                                                                    <option value="accepted" 
                                                                                    {{ $r->status == 'accepted' ? 'selected' : '' }}                                                                                   
                                                                                    >Accept</option>
                                                                                    <option value="declined"
                                                                                    {{ $r->status == 'declined' ? 'selected' : '' }}                                                                                   
                                                                                    >Decline</option>
                                                                                    <option value="pending"
                                                                                    {{ $r->status == 'pending' ? 'selected' : '' }}                                                                                   
                                                                                    >Pending</option>
                                                                                </select>
                                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                                            </form>
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
                                    <div class="d-flex gap-2">
                                        <a href="/admin/destination/{{$d->id}}" type="button" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.destination.destroy',['id' => $d->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input onclick="return confirm('Are you sure you want delete destination {{ $d->name }} ?')" 
                                                type="submit" class="btn btn-danger" value="DELETE">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @foreach($destinations as $d)
                        <div class="modal fade" id="desc{{$d->id}}" tabindex="-1" aria-labelledby="descLabel{{$d->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="descLabel{{$d->id}}">{{$d->name}} Description</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        {{$d->description}}
                                                        </p>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

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