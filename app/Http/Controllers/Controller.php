<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

abstract class Controller
{
    public function store(Request $request)
    {
        $cat = new Cat($request->all()); // Ambil data dari request
        $cat->user_id = Auth::id();  // Set user_id di controller
        $cat->save();
        
        // return redirect()->route('cats.index');  // Redirect setelah data disimpan
    }
    
}
