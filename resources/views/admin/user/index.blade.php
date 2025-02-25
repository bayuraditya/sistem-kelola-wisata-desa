@extends('layouts.admin.app')
@section('content')
<div class="page-heading">
    <h3>User</h3>
</div>
<div class="card">
    <div class="card-body">
    
        @if (session('success'))
            <div class="alert-success alert  alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
  Add User
</button>

<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/user/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required pattern="^\S(.*\S)?$" title="Cannot start or end with space">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required pattern="^\S(.*\S)?$" title="Cannot start or end with space">
            </div>
            <div class="mb-3">
                <label for="handphone_number" class="form-label">Handphone Number</label>
                <input type="number" class="form-control" id="handphone_number" name="handphone_number" required pattern="^\S(.*\S)?$" title="Cannot start or end with space">
            </div>
            <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control" id="password" name="password" required pattern="^\S(.*\S)?$" title="Cannot start or end with space">
                                                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                                Show
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <script>
            document.addEventListener("DOMContentLoaded", function () {
                let passwordInput = document.getElementById('password');
                let toggleButton = document.getElementById('togglePassword');

                toggleButton.addEventListener('click', function () {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleButton.textContent = 'Hide';
                    } else {
                        passwordInput.type = 'password';
                        toggleButton.textContent = 'Show';
                    }
                });
            });
        </script>


            <div class="mb-3">
                <label for="formFile" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" name="profile_picture" id="profile_picture" accept="image/*" >
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div class="card-body table-responsive">
                <table class="table dataTable-table" id="tableCategory">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>handphone Number</td>
                            <td>Role</td>
                            <td>Profile Picture</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$u->name}}</td>
                               <td>{{$u->email}}</td>
                               <td>{{$u->handphone_number}}</td>
                               <td>{{$u->role}}</td>
                               <td>
                                   <img src="{{ asset('images/' . $u->profile_picture) }}" style="height: 200px;width:200px; object-fit: cover;" class="" alt="...">
                               </td>
                                <td>
                                    <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input
                                            onclick="return confirm('Are you sure you want delete {{ $u->name }} ?')"
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
        $('#tableUser').DataTable();
    });
</script>


@endsection