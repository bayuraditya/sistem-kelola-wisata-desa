@extends('layouts.admin.app')
@section('content')

<div class="page-heading">
    <h3>Destination</h3>
</div>
<div class="card">
    <div class="card-body">

<br>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDestinationModal">
    Add Destination
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addDestinationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                <input type="text" class="form-control" id="name" name="name" >
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
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Destination Image</label>
                <input class="form-control" type="file" name="image[]" id="images" accept="image/*" multiple>

            </div>
            
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

<br><br>
    <div class="table-responsive">
        <table class="table table-bordered">
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
                    <td>Images</td>
                    <td>Created By</td>
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
                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#images{{$d->id}}">
                            Images
                        </button>

                        <div class="modal fade" id="images{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach($d->destination_image as $i)
                                        <img src="{{ asset('images/' . $i->image) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                    <td>{{$d->user->name}}</td>
                    <td>
                                    <a href="/admin/destination/{{ $d->id }}" type="submit"
                                        class="btn btn-warning">Edit</a>
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