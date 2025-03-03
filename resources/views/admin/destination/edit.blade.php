@extends('layouts.admin.app')
@section('content')

<div class="page-heading">
    <h3>Edit Destination '{{$destination->name}}'</h3>
</div>

<div class="card">
    <div class="card-body">
        <form action="/admin/destination/{{$destination->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$destination->name}}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$destination->description}}">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{$destination->location}}">
            </div>

            <div class="mb-3">
                <label for="entry_fee" class="form-label">Entry Fee</label>
                <input type="number" class="form-control" id="entry_fee" name="entry_fee" value="{{$destination->entry_fee}}">
            </div>

            <div class="mb-3">
                <label for="opening_time" class="form-label">Opening Time</label>
                <input type="time" class="form-control" id="opening_time" name="opening_time" value="{{$destination->opening_time}}">
            </div>

            <div class="mb-3">
                <label for="closed_time" class="form-label">Closed Time</label>
                <input type="time" class="form-control" id="closed_time" name="closed_time" value="{{$destination->closed_time}}">
            </div>

            <div class="mb-3">
                <label for="handphone_number" class="form-label">Handphone Number</label>
                <input type="number" class="form-control" id="handphone_number" name="handphone_number" value="{{$destination->handphone_number}}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$destination->email}}">
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" id="instagram" name="instagram" value="{{$destination->instagram}}">
            </div>

            <div class="mb-3">
                <label for="tiktok" class="form-label">Tiktok</label>
                <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{$destination->tiktok}}">
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook" value="{{$destination->facebook}}">
            </div>

            <div class="mb-3">
                <label for="youtube" class="form-label">Youtube</label>
                <input type="text" class="form-control" id="youtube" name="youtube" value="{{$destination->youtube}}">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category" id="category">
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ (isset($destination) && $destination->category_id == $c->id) ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
    <label for="formFile" class="form-label">Destination Image</label><br>

    @foreach($destinationImage as $di)
        <div class="image-container" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
            <img src="{{ asset('images/' . $di->image) }}" style="height: 200px; width: 200px; object-fit: cover;" class="destination-image" alt="">
            
            <input name="destinationImage[]" type="text" class="form-control " readonly style="width: 400px;"  value="{{ $di->image }}">
            
            <!-- Tombol Delete -->
            <button type="button" class="btn btn-danger delete-image">Delete</button>
        </div>
    @endforeach

    <input class="form-control mt-2" type="file" name="newImage[]" id="images" accept="image/*" multiple>
</div>

<style>
    .destination-image {
        transition: opacity 0.3s ease-in-out;
    }

    .destination-image:hover {
        opacity: 0.6;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".delete-image").forEach(button => {
            button.addEventListener("click", function() {
                this.parentElement.remove(); // Hapus elemen gambar dan input text
            });
        });
    });
</script>

            <hr>
            <div id="facilities-container">
                <h5>Facilities</h5>
                @foreach($facility as $f)
                    <div class="facility-item">
                        <label class="form-label">Facility {{$loop->iteration }}</label>
                        <input type="text" class="form-control" name="facility[{{$loop->iteration - 1}}][name]" value="{{$f->name}}" >
                        
                        <label class="form-label">Facility {{$loop->iteration }} Description</label>
                        <input type="text" class="form-control" name="facility[{{$loop->iteration - 1}}][description]" value="{{$f->description}}">
                        
                        <label class="form-label mt-2">Facility {{$loop->iteration}} Image</label><br>
                        <img src="{{ asset('images/' . $f->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="..." ><br>
                        {{$f->image}} <br>
                        <input type="file" class="form-control" name="facility[{{$loop->iteration - 1}}][image]" >
                        
                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-facility">Delete</button>
                    </div><br>
                @endforeach
            </div>
            <button type="button" id="add-facility-btn" class="btn btn-primary mt-3">Add More Facility</button>
       
            <hr>
            <div id="activities-container">
                <h5>Activities</h5>
                <div class="activity-item">
                    <label class="form-label">Activity 1</label>
                    <input type="text" class="form-control" name="activity[0][name]" >
                    
                    <label class="form-label">Activity 1 Description</label>
                    <input type="text" class="form-control" name="activity[0][description]">
                    
                    <label class="form-label mt-2">Activity 1 Image</label>
                    <input type="file" class="form-control" name="activity[0][image]">
                    
                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-activity">Delete</button>
                </div>
            </div>
            <button type="button" id="add-activity-btn" class="btn btn-primary mt-3">Add More Activity</button>
            
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("facilities-container");
    const addButton = document.getElementById("add-facility-btn");
    
    function updateFacilityIndexes() {
        const facilities = container.querySelectorAll(".facility-item");
        facilities.forEach((facility, index) => {
            const labels = facility.querySelectorAll(".form-label");
            labels[0].textContent = `Facility ${index + 1}`;
            labels[1].textContent = `Facility ${index + 1} Description`;
            labels[2].textContent = `Facility ${index + 1} Image`;
            
            facility.querySelectorAll("input").forEach(input => {
                const nameParts = input.name.match(/^facility\[\d+\]\[(.*?)\]$/);
                if (nameParts) {
                    input.name = `facility[${index}][${nameParts[1]}]`;
                }
            });
        });
    }
    
    addButton.addEventListener("click", function () {
        const facilityCount = container.querySelectorAll(".facility-item").length;
        
        const newFacility = document.createElement("div");
        newFacility.classList.add("facility-item");
        newFacility.innerHTML = `
            <label class="form-label">Facility ${facilityCount + 1}</label>
            <input type="text" class="form-control" name="facility[${facilityCount}][name]" required>
            
            <label class="form-label">Facility ${facilityCount + 1} Description</label>
            <input type="text" class="form-control" name="facility[${facilityCount}][description]">
            
            <label class="form-label mt-2">Facility ${facilityCount + 1} Image</label><br>
            <input type="file" class="form-control" name="facility[${facilityCount}][image]">
            
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-facility">Delete</button>
        `;
        
        container.appendChild(newFacility);
        updateFacilityIndexes();
    });
    
    container.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-facility")) {
            event.target.parentElement.remove();
            updateFacilityIndexes();
        }
    });
}); 


document.addEventListener("DOMContentLoaded", function () {
    // Facilities
    const facilityContainer = document.getElementById("facilities-container");
    const addFacilityButton = document.getElementById("add-facility-btn");
    
    function updateFacilityIndexes() {
        const facilities = facilityContainer.querySelectorAll(".facility-item");
        facilities.forEach((facility, index) => {
            const labels = facility.querySelectorAll(".form-label");
            labels[0].textContent = `Facility ${index + 1}`;
            labels[1].textContent = `Facility ${index + 1} Description`;
            labels[2].textContent = `Facility ${index + 1} Image`;
            
            facility.querySelectorAll("input").forEach(input => {
                const nameParts = input.name.match(/^facility\[\d+\]\[(.*?)\]$/);
                if (nameParts) {
                    input.name = `facility[${index}][${nameParts[1]}]`;
                }
            });
        });
    }
    
    addFacilityButton.addEventListener("click", function () {
        const facilityCount = facilityContainer.querySelectorAll(".facility-item").length;
        
        const newFacility = document.createElement("div");
        newFacility.classList.add("facility-item");
        newFacility.innerHTML = `
            <label class="form-label">Facility ${facilityCount + 1}</label>
            <input type="text" class="form-control" name="facility[${facilityCount}][name]" required>
            
            <label class="form-label">Facility ${facilityCount + 1} Description</label>
            <input type="text" class="form-control" name="facility[${facilityCount}][description]">
            
            <label class="form-label mt-2">Facility ${facilityCount + 1} Image</label><br>
            <input type="file" class="form-control" name="facility[${facilityCount}][image]">
            
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-facility">Delete</button>
        `;
        
        facilityContainer.appendChild(newFacility);
        updateFacilityIndexes();
    });
    
    facilityContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-facility")) {
            event.target.parentElement.remove();
            updateFacilityIndexes();
        }
    });
    
    // Activities
    const activityContainer = document.getElementById("activities-container");
    const addActivityButton = document.getElementById("add-activity-btn");
    
    function updateActivityIndexes() {
        const activities = activityContainer.querySelectorAll(".activity-item");
        activities.forEach((activity, index) => {
            const labels = activity.querySelectorAll(".form-label");
            labels[0].textContent = `Activity ${index + 1}`;
            labels[1].textContent = `Activity ${index + 1} Description`;
            labels[2].textContent = `Activity ${index + 1} Image`;
            
            activity.querySelectorAll("input").forEach(input => {
                const nameParts = input.name.match(/^activity\[\d+\]\[(.*?)\]$/);
                if (nameParts) {
                    input.name = `activity[${index}][${nameParts[1]}]`;
                }
            });
        });
    }
    
    addActivityButton.addEventListener("click", function () {
        const activityCount = activityContainer.querySelectorAll(".activity-item").length;
        
        const newActivity = document.createElement("div");
        newActivity.classList.add("activity-item");
        newActivity.innerHTML = `
            <label class="form-label">Activity ${activityCount + 1}</label>
            <input type="text" class="form-control" name="activity[${activityCount}][name]" required>
            
            <label class="form-label">Activity ${activityCount + 1} Description</label>
            <input type="text" class="form-control" name="activity[${activityCount}][description]">
            
            <label class="form-label mt-2">Activity ${activityCount + 1} Image</label>
            <input type="file" class="form-control" name="activity[${activityCount}][image]">
            
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-activity">Delete</button>
        `;
        
        activityContainer.appendChild(newActivity);
        updateActivityIndexes();
    });
    
    activityContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-activity")) {
            event.target.parentElement.remove();
            updateActivityIndexes();
        }
    });
});


</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tableDestination').DataTable();
    });
</script>

@endsection