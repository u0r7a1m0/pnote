<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('notes.index'); //
        $notes = Note::orderBy('created_at', 'asc')->get();
        return view('notes.index', [
        'notes' => $notes
    ]);
    }
    public function new()
    {
        return view('notes.new');//
    }
    
    public function create(Request $request)
    {

        $notes = new \App\Note;

        // 値の登録
        $notes->name = $request->name;
        $notes->description = $request->description;
        $notes->cord_txt = $request->cord_txt;
        $notes->url_txt = $request->url_txt;
        $notes->public_status = $request->public_status;

        // 保存
        $notes->save();

        // 一覧にリダイレクト
        return redirect()->to('notes.show');
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('notes.new');//
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notes = new Note;
        $notes->user_id   = $request->user_id;
        $notes->bookmark_id = $request->bookmark_id;
        $notes->note_tag_id = $request->note_tag_id;
        $notes->name   = $request->name;        
        $notes->description   = $request->description;
        $notes->cord_txt = $request->cord_txt;
        $notes->url_txt = $request->url_txt;
        $notes->public_status   = $request->public_status;
        $notes->save(); 
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
       return view('notes.show'); //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
       return view('notes.edit'); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
       return view('notes.update'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
       return view('notes.delete'); //
    }
}
