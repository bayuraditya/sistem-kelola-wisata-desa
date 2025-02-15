@extends('layouts.admin.app')
@section('content')

<!-- 
jumlah destinasi
jumlah category
jumlah fasilitas

---
top 5 destinasi...loadmore


-->
<div class="page-heading">
    <h3>User</h3>
</div>
<div class="card">
    <div class="card-body">
        User
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