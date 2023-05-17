<?php

namespace App\Http\Controllers;
use App\Models\Hotels;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    
     public function index()
        {
          return Hotels::all();
            
        }
        
        public function create()
        {
            
        }
        public function store(Request $request)
        {
       
       
       
        }
    
      
        public function show($id)
        {
            //
        }
       
        public function update()
        {
            
        }
    
        public function destroy($id)
        {
            
        }
    
 }

