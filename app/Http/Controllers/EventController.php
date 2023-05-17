<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index($id)
    {   
        $cates = Category::findOrFail($id);
        $events = Event::where('cate_id', $id)->paginate(10);
        return view('admin.dis', compact('cates','events'));
    }
        
    public function create($id)
    {
        $cates = Category::findOrFail($id);
        $events = Event::where('cate_id', $id)->get();
        return view('admin.addevent', compact('cates','events'));
    }
    
    
    public function store(Request $request,$id)
    {
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg'
        ]);    
        
        $data = new Event();
        $data->name = $request->name;
        $data->Location = $request->location;
        $data->Opening = $request->opening;
        $data->ContactInfo = $request->contact_info;
        $data->Price = $request->price;
        
        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('eventsimages'), $image_name);    
        $path = "eventsimages/".$image_name;
        $data->image = $path;
        $data->cate_id = $id;
        $data->save();
        
        return redirect('/cate/'.$id.'/addevent')->with('success', 'Added Successfully');
    }
    
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.editevent', compact('event'));
    }
    
    public function update(Request $request, $id)
{    
    $data = Event::findOrFail($id);
    $data->name = $request->name;
    $data->location = $request->location;
    $data->opening = $request->openinghours;
    $data->ContactInfo = $request->contactinfo;
    $data->price = $request->price;
    // dd($data);
    
    // Handle image upload if provided
    if ($request->hasFile('image')) {
       

        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('eventsimages'), $image_name);
        $path = "eventsimages/".$image_name;
        $data->image = $path;
        $data->save();
    }

    $data->save();

    return redirect('/cate/'.$id.'/'.'addevent')->with('success', 'deleted  successfully');
    }

    
    
    public function destroy($id, $eventid)
    {
        $event = Event::findOrFail($eventid);
        $event->delete();
        return redirect('/cate/'.$id.'/addevent')->with('success', 'Deleted Successfully');
    }
}