<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function admin()
    {
        $guest = Guest::latest()->paginate(6);
        $countguest = Guest::count();
        // dd($countguest);
        return view('admin.pages.dashboard',compact('guest','countguest'));
    }

    public function tamu()
    {
        
    }
}
