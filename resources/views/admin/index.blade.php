@extends('layouts.admin.app')
@section('content')

<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="">Total Destinations</h5>
        <p class="card-text">{{$totalDestinations}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="">Total Categories</h5>
        <p class="card-text">{{$totalCategories}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="">Total Users</h5>
        <p class="card-text">{{$totalUsers}}</p>
      </div>
    </div>
  </div>
</div>

    <div class="card">
        <div class="card-body">
            <h4>Destinations</h4>
            <br>
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
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><br>  
            <a href="/admin/destination">See More</a>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS (CDN) -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#tablePassenger').DataTable();
    });
</script>


@endsection