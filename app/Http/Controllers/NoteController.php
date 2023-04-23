<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\NoteTags;
use Illuminate\Http\Request;
use Auth;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('notes.index'); //
        // $notes = Note::all();
        // return view('notes/index', ['notes' => $notes]);
        $notes = Note::with('tags')->get();
        return view('notes.index', compact('notes'));

    }

    public function create()
    {
      // $tags = Tag::all();
      // return view('notes.create', compact('tags'));
      return view('notes.create', [
            'note' => new Note(),
            'tags' => Tag::all(),
        ]);

    }
  
    public function store(Request $request)
    {
      $note = new Note;
      $note->user_id = auth()->user()->id;
      $note->user_id = $request->user()->id;

      $note->name = $request->name;
      $note->description = $request->description;
      $note->cord_txt = $request->cord_txt;
      $note->url_txt = $request->url_txt;
      $note->public_status   = $request->public_status;
      $note->save();
      
      $tag_ids = $request->input('tag_ids', []);
      $note->tags()->sync($tag_ids);
      $validated = $request->validate([
        'public_status' => 'boolean',
      ]);
      

      return redirect('notes/'. $note->id)->with('message', 'Note created successfully!');
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
      $note->user_id = auth()->user()->id;
      $note->name = $request->name;
      $note->description = $request->description;
      $note->cord_txt = $request->cord_txt;
      $note->url_txt = $request->url_txt;
      $note->public_status = $request->public_status;
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


