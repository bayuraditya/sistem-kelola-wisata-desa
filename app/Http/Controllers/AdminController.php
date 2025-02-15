<?php

namespace App\Http\Controllers;

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
        return view('admin.destination.index',compact('user'));
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
