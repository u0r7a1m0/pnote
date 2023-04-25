<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag = new Tag;
        $tags = Tag::all();
        return view('tags.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:20|unique:tags',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
    
        return redirect()->back()->with('success', 'Tag created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/notes/create');
        //
    }
}
