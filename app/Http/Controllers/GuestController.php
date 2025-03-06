<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationImage;
use App\Models\Review;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
      
        $destinations = Destination::with('user', 'destinationImages', 'category', 'facilities', 'reviews')
    ->take(10)
    ->get();

        return view('home',compact('destinations'));
    }
    public function destinations(){
        $destinations = Destination::with('user', 'destinationImages', 'category', 'facilities', 'reviews')
        ->get();

        return view('destinations',compact('destinations'));
    }

    public function destination($id) {
        $destination = Destination::with('user', 'destinationImages', 'category', 'facilities', 'reviews')
            ->where('id', $id)
            ->firstOrFail(); // Mengembalikan 404 jika tidak ditemukan
        // dd($destination->reviews);        
        return view('destination', compact('destination'));
    }
    public function contact(){

        return view('contact');
    }
    public function galleries(){
        $images = DestinationImage::all();

        return view('galleries',compact('images'));
    }
    public function aboutUs(){
        return view('aboutUs');
    }
    public function storeReview(Request $request,$id){
        // dd($request);
        $destination = Destination::with('user', 'destinationImages', 'category', 'facilities', 'reviews')
        ->where('id', $id)
        ->firstOrFail(); // Mengembalikan 404 jika tidak ditemukan

        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->destination_id = $id;
        $review->save();
        return redirect()->route('single-destination', ['id' => $id])->with('success', 'Review created successfully.');

        // return redirect()->route('single-destination')->with('success', 'Review created successfully.');
        // return view('destination', compact('destination'));
    }
}
