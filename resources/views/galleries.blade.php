@extends('layouts.guest.menu-app')

@section('content')
    <!-- Hero Section -->
    <br>
    <br>
    <br>

    <div class="container py-5">
    <h2 class="text-center mb-4">Galleries</h2>
    <div class="row">
        @foreach($images as $i)
        <div class="col-md-4 mb-4">
            <img src="{{ asset('images/' . $i->image) }}" class="img-fluid rounded" alt="Destinasi 1">
        </div>
        @endforeach
    </div>
</div>

    <br><br><br><br><br><br><br><br><br><br>
@endsection
