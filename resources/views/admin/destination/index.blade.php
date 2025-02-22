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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDestinationModal">
    Add Destination
    </button>

    <!-- Modal -->
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
                    <label for="facility0-name" class="form-label">Facility 1</label>
                    <input type="text" class="form-control" id="facility0-name" name="facility[0][name]" required>

                    <label for="facility0-description" class="form-label">Facility 1 Description</label>
                    <input type="text" class="form-control" id="facility0-description" name="facility[0][description]" >
                
                    <label for="facility0-image" class="form-label mt-2">Facility 1 Image</label>
                    <input type="file" class="form-control" id="facility0-image" name="facility[0][image]" >
                </div>
            </div>
        <button type="button" id="add-facility-btn" class="btn btn-primary mt-3">Add More Facility</button>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let facilitiesContainer = document.getElementById("facilities-container");
                let addFacilityBtn = document.getElementById("add-facility-btn");
                let facilityCount = 1;

                addFacilityBtn.addEventListener("click", function () {
                    let newFacilityDiv = document.createElement("div");
                    newFacilityDiv.classList.add("facility-item", "mt-3");

                    newFacilityDiv.innerHTML = `
                        <label for="facility${facilityCount}-name" class="form-label">Facility ${facilityCount + 1}</label>
                        <input type="text" class="form-control" id="facility${facilityCount}-name" name="facility[${facilityCount}][name]" required>

                        <label for="facility${facilityCount}-description" class="form-label">Facility ${facilityCount + 1} Description</label>
                        <input type="text" class="form-control" id="facility${facilityCount}-description" name="facility[${facilityCount}][description]" >
                    
                        <label for="facility${facilityCount}-image" class="form-label mt-2">Facility ${facilityCount + 1} Image</label>
                        <input type="file" class="form-control" id="facility${facilityCount}-image" name="facility[${facilityCount}][image]" >
                    `;
                    
                    facilitiesContainer.appendChild(newFacilityDiv);
                    facilityCount++;
                });
            });
        </script>

<hr><div id="activities-container">
    <h5>Activities</h5>
    <div class="activity-item">
        <label for="activity0-name" class="form-label">Activity 1</label>
        <input type="text" class="form-control" id="activity0-name" name="activity[0][name]" required>

        <label for="activity0-description" class="form-label">Activity 1 Description</label>
        <input type="text" class="form-control" id="activity0-description" name="activity[0][description]">
    
        <label for="activity0-image" class="form-label mt-2">Activity 1 Image</label>
        <input type="file" class="form-control" id="activity0-image" name="activity[0][image]">
    </div>
</div>
<button type="button" id="add-activity-btn" class="btn btn-primary mt-3">Add More Activity</button>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let activitiesContainer = document.getElementById("activities-container");
        let addActivityBtn = document.getElementById("add-activity-btn");
        let activityCount = 1;

        addActivityBtn.addEventListener("click", function () {
            let newActivityDiv = document.createElement("div");
            newActivityDiv.classList.add("activity-item", "mt-3");

            newActivityDiv.innerHTML = `
                <label for="activity${activityCount}-name" class="form-label">Activity ${activityCount + 1}</label>
                <input type="text" class="form-control" id="activity${activityCount}-name" name="activity[${activityCount}][name]" required>

                <label for="activity${activityCount}-description" class="form-label">Activity ${activityCount + 1} Description</label>
                <input type="text" class="form-control" id="activity${activityCount}-description" name="activity[${activityCount}][description]">
            
                <label for="activity${activityCount}-image" class="form-label mt-2">Activity ${activityCount + 1} Image</label>
                <input type="file" class="form-control" id="activity${activityCount}-image" name="activity[${activityCount}][image]">
            `;
            
            activitiesContainer.appendChild(newActivityDiv);
            activityCount++;
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
                    <td>{{$d->category->name}}</td>
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
                                                @foreach($d->activities as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->name}}</td>
                                                    <td>{{$d->description}}</td>
                                                    <td>                                     
                                                        <img src="{{ asset('images/' . $d->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
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
                        <!-- <a href="/admin/destination/{{ $d->id }}" type="submit" class="btn btn-warning">Edit</a> -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDestination{{$d->id}}">
                            Edit
                        </button>

                        <div class="modal fade" id="editDestination{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit {{$d->name}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="destination/{{$d->id}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$d->name}}">
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
                                                    <option 
                                                        @if($c->id == $d->category_id)
                                                            selected
                                                        @endif
                                                    value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Destination Image</label><br>
                                            @foreach(optional($d->destinationImages) ?? [] as $i)
                                                <img src="{{ asset('images/' . $i->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                                            @endforeach
                                            <input class="form-control" type="file" name="image[]" id="images" accept="image/*" multiple>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <form action="{{ route('admin.destination.destroy', $d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input
                                            onclick="return confirm('Are you sure you want delete {{ $d->id }} ?')"
                                            type="submit" class="btn btn-danger" value="DELETE">
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