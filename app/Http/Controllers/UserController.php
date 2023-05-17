<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
     public function index($id)
        {
        $cates = Category::findOrFail($id);
        $events = Event::where('cate_id', $id)->paginate(10);
        return view('Userdis', compact('cates','events'));
        }
        
        
     //    public function hotelDetails($id)
     //    {
     //        $Hot = Hotels::findOrFail($id);
        
     //        return view('hotel-details', compact('Hot'));
     //    }
        
 }

