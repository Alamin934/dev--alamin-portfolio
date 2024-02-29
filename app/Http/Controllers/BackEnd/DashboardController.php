<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }

    public function socialLinkIndex(){
        $social_links = DB::table('social_links')->latest()->first();
        return view('backend.social-links',compact('social_links'));
    }

    public function socialLinkStore(Request $request){
        DB::table('social_links')->updateOrInsert(
            ['id'=>'1'],
            [
                'facebook'  => $request->facebook,
                'twitter'  => $request->twitter,
                'instagram'  => $request->instagram,
                'linkedin'  => $request->linkedin,
                'google_plus'  => $request->google_plus,
                'youtube'  => $request->youtube,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );

        return response()->json(['status'=>'success']);
    }
}
