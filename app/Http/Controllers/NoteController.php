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
        $notes = Note::where('public_status', 1)->get();
        return view('notes.index', compact('notes'));

    }

    public function create()
    {
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
      // NoteTag中間テーブルに選択されたTagの情報を保存する
      if ($request->tags) {
          $note->tags()->sync($request->tags);
      }
      
      // $tag_ids = $request->input('tag_ids', []);
      // $note->tags()->sync($tag_ids);
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
        $tags = Tag::all();
        $note_tags = NoteTag::where('note_id', $id)->get();
    
        return view('notes.edit', [
            'note' => $note,
            'tags' => $tags,
            'note_tags' => $note_tags
        ]);
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
      if ($request->tags) {
          $note->tags()->sync($request->tags);
      }
      return redirect('notes/'.$id);
    }

    // public function destroy($id)
    // {
    //   $note = Note::find($id);
    //   $note->delete();
    //   return redirect('/notes');
    // }
    public function destroy($noteId)
    {
        $note = Note::find($noteId);
        $note->note_Tags()->delete(); // Noteに関連するNoteTagを削除
        $note->delete(); // Noteを削除
        return redirect()->back()->with('success', 'Noteが削除されました');
    }
}


