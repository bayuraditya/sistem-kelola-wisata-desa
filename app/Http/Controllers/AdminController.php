<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationImage;
use App\Models\Facility;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
     
        $user = Auth::user();
        $totalDestinations = Destination::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        $destinations = Destination::with('user', 'destinationImages', 'category', 'facilities', 'reviews')
        ->take(5) // Ambil 5 data saja
        ->get();

        return view('admin.index',compact('user','totalDestinations','totalCategories','totalUsers','destinations'));
    }

    public function destination(){
        
        $user = Auth::user();
        $destinations = Destination::with('user', 'destinationImages', 'category', 'facilities','reviews')->get();

        $categories = Category::all();

        // dd($destinations);
        return view('admin.destination.index',compact('user','destinations','categories'));
    }
    public function storeDestination(Request $request){
            // dd($request);
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

        foreach($request->facility ?? [] as $f){
            $facility = new Facility();
            $facility->name = $f['name'];
            $facility->description = $f['description'];
            
            if(isset($f['image'])){
                $facilityImage = $f['image'];
                $facilityImageName = time() . '_' . uniqid() . '.' . $facilityImage->getClientOriginalExtension();
                // Move the image to the desired location
                $facilityImage->move(public_path('images'), $facilityImageName);
                $facility->image = $facilityImageName;
            }
            $facility->destination_id = $destination->id;
            $facility->save();
        }

        foreach($request->activity ?? [] as $a){
            $activity = new Activity();
            $activity->name = $a['name'];
            $activity->description = $a['description'];

            
            if(isset($a['image'])){
                $activityImage = $a['image'];
                $activityImageName = time() . '_' . uniqid() . '.' . $activityImage->getClientOriginalExtension();
                // Move the image to the desired location
                $activityImage->move(public_path('images'), $activityImageName);
                $activity->image = $activityImageName;
            }
            
            $activity->destination_id = $destination->id;
            $activity->save();
        }
        
        return redirect()->route('admin.destination.index')
                         ->with('success', 'Destination created successfully');
    }
    public function editdestination($id){
        $destination = Destination::findOrFail($id);
        $categories = Category::all();
        $destinationImage = DestinationImage::where('destination_id', $id)->get();
        $review = Review::where('destination_id',$id)->get();
        $facility = Facility::where('destination_id',$id)->get();
        $activity = Activity::where('destination_id',$id)->get();
        $user = Auth::user();

        return view('admin.destination.edit', compact('destination','user','categories','facility','activity','destinationImage'));
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
       
        // delete destination image lama
        $deleteDestinationImage = destinationImage::where('destination_id',$destination->id)->get();
        foreach($deleteDestinationImage as $d){
            $d->delete();
        }
        
        if (!empty($request->destinationImage) && is_array($request->destinationImage)) {
            foreach ($request->destinationImage as $image1) {
                $destinationImage = new DestinationImage();
                $destinationImage->image = $image1; 
                $destinationImage->destination_id = $destination->id;
                $destinationImage->save();
            }
        } 

        //upload destination image baru
        if ($request->hasFile('newImage')) {
            $images2 = $request->file('newImage');
            foreach($images2 as $image2){
                $imageName = time() . '_' . uniqid() . '.' . $image2->getClientOriginalExtension();
                // Move the image to the desired location
                $image2->move(public_path('images'), $imageName);
               
                $destinationImage2 = new destinationImage();
                $destinationImage2->image = $imageName;
                $destinationImage2->destination_id = $destination->id;
                $destinationImage2->save();
            }
        } else {
            $imageName = null;  // Tidak ada gambar yang di-upload
        }
        // dd($request);
        
        $deleteFacility = Facility::where('destination_id',$destination->id)->get();
        foreach($deleteFacility ?? []  as $df){
            $df->delete();
        }
        foreach($request->facility ?? [] as $f){
            $facility = new Facility();
            $facility->name = $f['name'] ?? 'Default Name';;
            $facility->description = $f['description'] ?? 'Default desc';;
            
            if(isset($f['newImage'])){
                // dd($request);
                $facilityImage = $f['newImage'];
                $facilityImageName = time() . '_' . uniqid() . '.' . $facilityImage->getClientOriginalExtension();
                // Move the image to the desired location
                $facilityImage->move(public_path('images'), $facilityImageName);
                $facility->image = $facilityImageName;
            }elseif(isset($f['oldImage'])){
                $facility->image = $f['oldImage'];
            }
            $facility->destination_id = $destination->id;
            $facility->save();
        } 

        $deleteActivity = Activity::where('destination_id',$destination->id)->get();
        foreach($deleteActivity ?? []  as $da){
            $da->delete();
        }
        foreach($request->activity ?? [] as $a){
            $activity = new Activity();
            $activity->name = $a['name'] ?? 'Default Name';;
            $activity->description = $a['description'] ?? 'Default desc';;
            
            if(isset($a['newImage'])){
                $activityImage = $a['newImage'];
                $activityImageName = time() . '_' . uniqid() . '.' . $activityImage->getClientOriginalExtension();
                // Move the image to the desired location
                $activityImage->move(public_path('images'), $activityImageName);
                $activity->image = $activityImageName;
            }elseif(isset($a['oldImage'])){
                $activity->image = $a['oldImage'];
            }
            $activity->destination_id = $destination->id;
            $activity->save();
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



    public function createFacility($destinationId){
        $destinationId = $destinationId;
        // dd($destinationId);
        return view('admin.destination.facility.create',compact('destinationId'));
    }
    public function storeFacility($destinationId, Request $request){
    //    dd($destinationId);
          // Simpan data facility
          $facility = new Facility();
          $facility->destination_id = $destinationId;
          $facility->name = $request->name;
          $facility->description = $request->description;
  
          // Upload gambar jika ada
             
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);
            // $user->profile_picture = $profilePictureName;
            $facility->image = $imageName;            
        }
  
        $facility->save();
        return redirect()->route('admin.destination.index')
        ->with('success', 'Facility created successfully');
    }
    public function editFacility($destinationId,$facilityId){
        $facility = Facility::where('id', $facilityId)
                            ->where('destination_id', $destinationId)
                            ->first();
        $destinationId = $destinationId;
        return view('admin.destination.facility.edit',compact('facility','destinationId'));
    }
    public function updateFacility($destinationId,$facilityId, Request $request){
        // dd($request);
        $facility = Facility::findOrFail($facilityId);
        $facility->name = $request->name;
        $facility->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);
            // $user->profile_picture = $profilePictureName;
            $facility->image = $imageName;            
        }
      
        // $facility->destination_id = $id;
        $facility->save();

        return redirect()->route('admin.destination.index')
        ->with('success', 'Facility updated successfully');
    }
    public function destroyFacility($destinationId, $facilitiyId)
    {
        $facility = Facility::findOrFail($facilitiyId);
        $facility->delete();
        return redirect()->route('admin.destination.index')->with('success', 'Facility deleted successfully.');
    }


    public function createActivity($destinationId){
        $destinationId = $destinationId;
        return view('admin.destination.activity.create',compact('destinationId'));
    }
    
    public function storeActivity($destinationId, Request $request){
        $activity = new Activity();
        $activity->destination_id = $destinationId;
        $activity->name = $request->name;
        $activity->description = $request->description;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $activity->image = $imageName;            
        }
    
        $activity->save();
        return redirect()->route('admin.destination.index')
            ->with('success', 'Activity created successfully');
    }
    
    public function editActivity($destinationId, $activityId){
        $activity = Activity::where('id', $activityId)
                            ->where('destination_id', $destinationId)
                            ->first();
        $destinationId = $destinationId;
        return view('admin.destination.activity.edit',compact('activity','destinationId'));
    }
    
    public function updateActivity( $destinationId,$activityId, Request $request){
        $activity = Activity::findOrFail($activityId);
        $activity->name = $request->name;
        $activity->description = $request->description;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $activity->image = $imageName;            
        }
      
        $activity->save();
    
        return redirect()->route('admin.destination.index')
            ->with('success', 'Activity updated successfully');
    }
    
    public function destroyActivity($destinationId, $activityId)
    {
        $activity = Activity::findOrFail($activityId);
        $activity->delete();
        return redirect()->route('admin.destination.index')->with('success', 'Activity deleted successfully.');
    }
    
    



    public function category(){
        
        $user = Auth::user();
        $categories = Category::all();
        return view('admin.category.index',compact('user','categories'));
    }
    public function storeCategory(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index')->with('success','Category created successfully');
    }
    public function updateCategory(Request $request,$id ){
        $category = Category::findOrFail($id);
        $category->name = $request->editName;
        $category->save();
        return redirect()->route('admin.category.index')->with('success','Category updated successfully');

    }
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
    public function user(){
        
        $user = Auth::user();
        $users = User::all();
        return view('admin.user.index',compact('user','users'));
    }
    public function storeUser(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->handphone_number = $request->handphone_number;
        $user->role = 'admin';
        $user->password = Hash::make($request->password);
        
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $profilePictureName = time() . '_' . uniqid() . '.' . $profilePicture->getClientOriginalExtension();
            // Move the image to the desired location
            $profilePicture->move(public_path('images'), $profilePictureName);
            $user->profile_picture = $profilePictureName;
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');

    }

    public function destroyUser($id){
        $user = User::findOrFail($id);
        $user->delete();
       return redirect()->route('admin.user.index')->with('success', 'User Deleted successfully.');
    }
    public function profile(){
        
        $user = Auth::user();
        return view('admin.profile.edit',compact('user'));
    }
    public function updateProfile(Request $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->handphone_number = $request->handphone_number;
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $profilePictureName = time().'.'.$profilePicture->extension();  // Dapatkan ekstensi file
            $profilePicture->move(public_path('images'), $profilePictureName);  // Simpan gambar
            $user->profile_picture = $profilePictureName;
        }
        $user->save();
        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully');
    }
    public function showChangePasswordForm(){
        $user = Auth::user();
        return view('admin.profile.change-password',compact('user'));
    }
    public function changePassword(Request $request,$id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password|confirmed',
        ], [
            'new_password.different' => 'The new password must be different from the current password.',
            'new_password.confirmed' => 'Password confirmation does not match.',
        ]);
        // Dapatkan pengguna yang sedang login
        $user = User::findOrFail($id);
        // Cek apakah password saat ini cocok dengan yang diinputkan
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            // Kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Wrong Current Password');
        }
        // Update password pengguna dengan password baru
        $user->password = Hash::make($validatedData['new_password']);
        $user->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.profile.showChangePasswordForm')->with('success', 'Password changed successfully.');
    }
    public function updateReview(Request $request, $id){
        $review = Review::findOrFail($id);
        // $statusName = 'status' . $id; 
        $status = $request->status;
        $review->status = $status;
        // dd($statusName);
        $review->save();

        return redirect()->route('admin.destination.index')->with('success', 'Review Updated successfully.');

    }
}
