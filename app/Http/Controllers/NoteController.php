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
        $notes = Note::all();
        return view('notes/index', ['notes' => $notes]);

    }

    public function create()
    {
      return view('notes/create');
      
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
  {
      $note = new Note;
      // フォームから送られてきたデータをそれぞれ代入
      $note->user_id = $request->user_id;
      $note->name = $request->name;
      $note->description = $request->description;
      $note->cord_txt = $request->cord_txt;
      $note->url_txt = $request->url_txt;
      $note->public_status   = $request->public_status;
      // データベースに保存
      $note->save();
      return redirect('notes/'.$id);
    }
    
    public function show($id)
    {
      $note = Note::find($id);
      return view('notes.show', ['note' => $note]);
    }

    public function edit($id)
    {
      $note = Note::find($id);
      return view('notes.edit', ['note' => $note]);
    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        $note->name = $request->name;
        $note->description = $request->description;
        $note->cord_txt = $request->cord_txt;
        $note->url_txt = $request->url_txt;
        $note->public_status   = $request->public_status;
        $note->save();
        return redirect('notes/'.$id);
    }

    public function destroy($id)
    {
      $note = Note::find($id);
      $note->delete();
      return redirect('/notes');
    }
}

