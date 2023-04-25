<?php

namespace App\Http\Controllers;

use App\Models\NoteTag;
use Illuminate\Http\Request;

class NoteTagController extends Controller

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $noteTag = new NoteTag;
        $noteTag->note_id = $request->note_id;
        $noteTag->tag_id = $request->tag_id;
        $noteTag->is_bookmarked = $request->is_bookmarked;
        $noteTag->save();
    
        // NoteやTagのブックマーク情報を更新する処理を記述する
        // NoteTagコントローラのstoreメソッド内に記述する
        $note = Note::find($request->note_id);
        $note->is_bookmarked = NoteTag::where('note_id', $request->note_id)->where('is_bookmarked', true)->exists();
        $note->save();
        
        $tag = Tag::find($request->tag_id);
        $tag->is_bookmarked = NoteTag::where('tag_id', $request->tag_id)->where('is_bookmarked', true)->exists();
        $tag->save();

    }


    /**
     * Display the specified resource.
     */
    public function show(NoteTag $noteTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoteTag $noteTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NoteTag $noteTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NoteTag $noteTag)
    {
        //
    }
}
