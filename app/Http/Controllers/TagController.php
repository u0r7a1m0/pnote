<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $tags = Tag::all();
        // return view('notes.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(Request $request)
    {

        foreach($match[1] as $input)
        {
    	$tag = Tag::create(['name'=>$input]);
    	$tag = null;
        $tag_id=Tag::where('name',$input)->get(['id']);
        $note = Note::find($note_id);
        $note -> tags()->attach($tag_id);
        }
        $request->validate([
            'name' => 'required|max:255|unique:tags',
        ]);
    
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
