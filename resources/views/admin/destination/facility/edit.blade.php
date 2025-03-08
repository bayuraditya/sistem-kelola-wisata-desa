@extends('layouts.admin.app')
@section('content')

<div class="page-heading">
    <h3>Edit Facility</h3>
</div>

<div class="card">
    <div class="card-body">
        <form action="/admin/destination/{{$destinationId}}/facility/{{$facility->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$facility->name}}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" >{{$facility->description}}</textarea>

            </div>
            <img src="{{ asset('images/' . $facility->image) }}" style="height: 200px; width: 200px; object-fit: cover;" class="destination-image" alt="">

            <input class="form-control mt-2" type="file" name="image" id="images" accept="image/*" >
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tableDestination').DataTable();
    });
</script>

@endsection