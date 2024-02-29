<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    public function index()
    {
        $skills = DB::table('skills')->latest()->get();
        return view('backend.skills-form', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|max:255|string',
            'percentage'  => 'required|numeric',
        ]);

        DB::table('skills')->updateOrInsert(
            ['id' => $request->id],
            [
                'name'  => $request->name,
                'percentage'  => $request->percentage,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );

        return response()->json(['status'=>'success']);
    }

    public function edit(string $id){
        $skill = DB::table('skills')->whereId($id)->first();
        return response()->json(['status'=>'success', 'data'=>$skill]);
    }

    public function destroy(string $id){
        $skill = DB::table('skills')->whereId($id)->delete();
        return redirect()->back()->with(['message'=>'Skill Deleted successfully', 'alert-type'=>'success']);
    }
}
