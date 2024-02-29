<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = DB::table('banners')->latest()->first();
        $social_links = DB::table('social_links')->latest()->first();
        $about = DB::table('abouts')->latest()->first();
        $skills = DB::table('skills')->get();
        return view('home', compact('banner','social_links','about','skills'));
    }
}
