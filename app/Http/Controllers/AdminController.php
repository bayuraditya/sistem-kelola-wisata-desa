<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationImage;
use App\Models\Facility;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('admin.index',compact('user'));
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

        foreach($request->facility as $f){
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

        foreach($request->activity as $a){
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
        // $allCourt = Court::all();
    //     $destination = destination::find($id);
    //     $user = Auth::user();
    //     // dd($destination);
    //     return view('admin.destination.edit', compact('destination','user',,'operator'));
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
    // public function updateUser(Request $request,$id){
    //     $user = User::findOrFail($id);
    //     $user->name = $request->editName;
    //     $user->email = $request->editEmail;
    //     $user->handphone_number = $request->editHandphoneNumber;
    //     $user->password = Hash::make($request->editPassword);
    //     if ($request->hasFile('profile_picture')) {
            
    //           if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
    //             unlink(public_path($user->profile_picture));
    //         }
    //         $profilePicture = $request->file('profile_picture');
    //         $profilePictureName = time() . '_' . uniqid() . '.' . $profilePicture->getClientOriginalExtension();
    //         // Move the image to the desired location
    //         $profilePicture->move(public_path('images'), $profilePictureName);
           
            
    //         $user->profile_picture = $profilePictureName;
    //     }
    //     $user->save();
    //     return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    // }
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
}
