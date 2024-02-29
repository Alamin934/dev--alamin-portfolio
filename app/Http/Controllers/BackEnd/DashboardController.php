<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }

    public function socialLinkIndex(){
        return view('backend.social-links');
    }

    public function socialLinkStore(Request $request){
        
    }
}
