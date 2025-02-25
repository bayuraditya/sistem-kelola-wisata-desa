@extends('layouts.admin.app')
@section('content')

<div class="page-heading">
    <h3>Edit Profile</h3>
</div>
        <div class="card">
         <div class="card-body">

           @if(session('success'))
           <div class="alert-success alert  alert-dismissible fade show" role="alert" >
             {{ session('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <form action="/admin/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="user_name" class="form-label">Nama </label>
                <input type="text" class="form-control" id="user_name" name="name" value="{{$user->name}}">
              </div>
              <div class="mb-3">
                <label for="user_name" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
              </div>
              <div class="mb-3">
                <label for="user_name" class="form-label">Handphone Number</label>
                <input type="number" class="form-control" id="handphone_number" name="handphone_number" value="{{$user->handphone_number}}">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Profile Picture</label><br>
                <img src="{{ asset('images/' . $user->profile_picture) }}" alt="Image" style="max-width: 200px;">
                <br>  {{$user->profile_picture}} <br><br>
                <input class="form-control" type="file" id="profile_picture" name="profile_picture" >
              </div>
    <button type="submit" class="btn btn-success">Save</button>
  </form>
  <br><br>  
  <a href="/admin/profile/change-password/">Change Password</a>
  
  
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS (CDN) -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#tableShip').DataTable();
    });
</script>




@endsection