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
    <h3>Category</h3>
</div>
<div class="card">
    <div class="card-body">
        Category
    </div>
    <br><br>


    
    <div class="card-body table-responsive">
                <table class="table dataTable-table" id="tableShip">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Kapal</td>
                            <td>Rute Keberangkatan</td>
                            <td>Waktu Keberangkatan</td>
                            <td>Rute Kedatangan</td>
                            <td>Waktu Kedatangan</td>
                            <td>Tipe Kapal</td>
                            <td>Image</td>
                            <td>Operator</td>
                    @if($user->role == 'master' ||$user->role == 'operator')
                            <td>Action</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($ship as $s)
                            <tr>
                               <td>{{$s->id}}</td>
                               <td>{{$s->name}}</td>
                               <td>{{$s->departureRoute->route}}</td>
                               <td>{{$s->departure_time}}</td>
                               <td>{{$s->arrivalRoute->route}}</td>
                               <td>{{$s->arrival_time}}</td>
                               <td>{{$s->type}}</td>
                               <td>


                                   
                                   <!-- Button trigger modal -->
                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#image{{$s->id}}">
                                       Lihat Gambar
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="image{{$s->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$s->name}}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($s->shipImages as $i)
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
                               <td>{{$s->operator->name}}</td>
                    @if($user->role == 'master' || $user->role == 'operator')
                                <td>
                                    <a href="/master/ship/{{ $s->id }}" type="submit"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('master.ship.destroy', $s->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input
                                            onclick="return confirm('Are you sure you want delete {{ $s->id }} ?')"
                                            type="submit" class="btn btn-danger" value="DELETE">
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS (CDN) -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#tableCategory').DataTable();
    });
</script>


@endsection