<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;

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
            'section_title'  => 'required|max:255|string',
            'section_desc'  => 'nullable',
            'user_photo'  => ['required','image','mimes:png,jpg,webp', File::image()
            ->max('1mb')
            ->dimensions(Rule::dimensions()->minWidth(400)->minHeight(400)->maxWidth(600)->maxHeight(600)),],
            'position'  => 'required',
            'summery'  => 'required',
            'dob'  => 'required',
            'website'  => 'string',
            'phone'  => 'required|string|max:20',
            'city'  => 'required',
            'age'  => 'required|numeric',
            'email'  => 'required|email',
            'freelance'  => 'required|numeric',
        ]);
        $data = $request->all();
        array_shift($data);

        if($request->file('user_photo')){
            $file = $request->file('user_photo');
            $extension = $file->extension();
            $new_file_name = 'about-photo'.'.'.$extension;
            $file->move(storage_path('app/public/uploads'), $new_file_name);
            
            DB::table('abouts')->updateOrInsert(
                ['id' => '1'],
                $data,
            );
            DB::table('abouts')->updateOrInsert(
                ['id' => '1'],
                ['user_photo'=>$new_file_name],
            );
        }

        return response()->json(['status'=>'success']);
    }

}
