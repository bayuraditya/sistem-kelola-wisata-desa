<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('admin.index',compact('user'));
    }

    public function destination(){
        
        $user = Auth::user();
        // $destinations = Destination::with('user', 'destination_image','category','facilities')->get();
        $destinations = Destination::with('user', 'destination_image', 'category', 'facilities')->get();

        $categories = Category::all();
        dd($destinations);
        
        return view('admin.destination.index',compact('user','destinations','categories'));
    }
    public function storeDestination(Request $request){
        $destination = new Destination();
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->location = $request->location;
        $destination->entry_fee = $request->entry_fee;
        $destination->opening_time = $request->opening_time;
        $destination->closed_time = $request->closed_time;
        $destination->handphone_number = $request->handphone_number;
        $destination->email = $request->email;
        $destination->instagram = $request->instagram;
        $destination->tiktok = $request->tiktok;
        $destination->facebook = $request->facebook;
        $destination->youtube = $request->youtube;
        $destination->category_id = $request->category;
        $destination->user_id = Auth::user()->id;
        // dd($destination);   
        $destination->save();
         if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach($images as $image){
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the image to the desired location
                $image->move(public_path('images'), $imageName);

                $destinationImage = new DestinationImage();
                $destinationImage->image = $imageName; 
                $destinationImage->destination_id = $destination->id;
                $destinationImage->save();

            }
        } else {
            $imageName = null;  // Tidak ada gambar yang di-upload
        }
     
        return redirect()->route('admin.destination.index')
                         ->with('success', 'Destination created successfully');
    }
    public function editdestination($id){
        // $allCourt = Court::all();
    //     $destination = destination::find($id);
    //     $user = Auth::user();
    //     // dd($destination);
    //     return view('master.destination.edit', compact('destination','user',,'operator'));
    }
    public function updatedestination(Request $request, $id){
        $destination = destination::findOrFail($id);
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->location = $request->location;
        $destination->entry_fee = $request->entry_fee;
        $destination->opening_time = $request->opening_time;
        $destination->closed_time = $request->closed_time;
        $destination->handphone_number = $request->handphone_number;
        $destination->email = $request->email;
        $destination->instagram = $request->instagram;
        $destination->tiktok = $request->tiktok;
        $destination->facebook = $request->facebook;
        $destination->youtube = $request->youtube;
        $destination->category_id = $request->category;
        $destination->user_id = Auth::user()->id;
       
        if ($request->hasFile('image')) {
            $deletedestinationImage = destinationImage::where('destination_id',$destination->id)->get();
            foreach($deletedestinationImage as $d){
                $d->delete();
            }
            $images = $request->file('image');
            foreach($images as $image){
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the image to the desired location
                $image->move(public_path('images'), $imageName);
               
                $destinationImage = new destinationImage();
                $destinationImage->image = $imageName;
                $destinationImage->destination_id = $destination->id;
                $destinationImage->save();
            }
        } else {
            $imageName = null;  // Tidak ada gambar yang di-upload
        }
        $destination->save();

        return redirect()->route('admin.destination.index')
                         ->with('success', 'Destination updated successfully');
    }
    public function destroydestination($id){
        $destination = destination::findOrFail($id);
        $destination->delete();
        return redirect()->route('admin.destination.index')
        ->with('success', 'Destination deleted successfully');
    }
    public function facility(){
        
        $user = Auth::user();
        return view('admin.facility.index',compact('user'));
    }
    public function category(){
        
        $user = Auth::user();
        return view('admin.category.index',compact('user'));
    }
    public function user(){
        
        $user = Auth::user();
        return view('admin.user.index',compact('user'));
    }
    public function profile(){
        
        $user = Auth::user();
        return view('admin.profile.edit',compact('user'));
    }
}
