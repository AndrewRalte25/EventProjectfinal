<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::get();
        return view('admin.discate', compact('cats'));
    }
        
    public function create()
    {
        return view('admin.addcate');
    }
    
    public function store(Request $request)
    {
        
        $data = new Category();
        $data->type = $request->type;
        $data->save();
        
        return redirect('/cate')->with('success', 'Added Successfully');
    }
    
    public function edit($id)
    {
        $cates = Category::find($id);
        return view('admin.editcate', compact('cates'));
    }
    
    public function update(Request $request, $id)
{   
    
    $data = Category::findOrFail($id);
    $data->TYPE = $request->name;
    $data->save();

    return redirect('/cate')->with('success', 'Hotel updated successfully');
 }
     
    public function payment()
    {
        $pays = Ticket::paginate(10);
        return view('admin.payment', compact('pays'));
    }
    public function users()
    {
        $users = User::paginate(10);
        return view('admin.user', compact('users'));
    }
    
    
    
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/cate')->with('success', 'Deleted Successfully');
    }
}
