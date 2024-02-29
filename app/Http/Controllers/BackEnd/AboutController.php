<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // $about = DB::table('abouts')->latest()->first();
        return view('backend.about-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner_title'  => 'required|max:255|string',
            'banner_subTitle'  => 'required|max:255',
            'banner_image'  => ['required','image','mimes:png,jpg,webp', File::image()
            ->max('1mb')
            ->dimensions(Rule::dimensions()->minWidth(1300)->minHeight(700)),]
        ]);

        // if($request->file('banner_image')){
        //     $file = $request->file('banner_image');
        //     $extension = $file->extension();
        //     $new_file_name = 'bg-image'.'.'.$extension;
        //     $file->move(storage_path('app/public/uploads'), $new_file_name);
            
        //     DB::table('banners')->updateOrInsert(
        //         ['id' => '1'],
        //         [
        //             'banner_title'  => $request->banner_title,
        //             'banner_subTitle'  => $request->banner_subTitle,
        //             'banner_image'  => $new_file_name,
        //             'created_at'  => now(),
        //             'updated_at'  => now(),
        //         ]
        //     );
        // }

        return response()->json(['status'=>'success']);
    }

}
