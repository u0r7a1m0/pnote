<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\NoteTags;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    
    $notes = Note::query()->where('public_status', 1);
    
    // キーワードで検索
    if ($request->has('keyword')) {
        $keyword = $request->input('keyword');
        $notes->where('name', 'like', "%{$keyword}%")
              ->orWhere('description', 'like', "%{$keyword}%")
              ->orWhere('cord_txt', 'like', "%{$keyword}%");
    } else {
        $keyword = null;
    }
    // タグで検索
    if ($request->has('tag')) {
        $tag = $request->input('tag');
        $notes->whereHas('tags', function ($query) use ($tag) {
        $query->where('name', $tag);
    });

    }
    
    $tags = Tag::all();

    return view('notes.index', [
        'notes' => $notes->paginate(10)->where('public_status', 1),
        'keyword' => $keyword,
        'tags' => $tags,
        ]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:20|unique:notes',
            'description' => 'required|min:2|max:255',
            'public_status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $note = new Note;
        $note->user_id = auth()->user()->id;
        $note->user_id = $request->user()->id;
        
        $note->name = $request->name;
        $note->description = $request->description;
        $note->cord_txt = $request->cord_txt;
        $note->url_txt = $request->url_txt;
        $note->public_status   = $request->public_status;
        $note->save();
        $note->tags()->sync($request->input('tags', []));
        return redirect()->route('notes.index');
        if ($request->tags) {
          $note->tags()->sync($request->tags);
      }

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
        $note = Note::findOrFail($id);
        $tags = Tag::all();
        return view('notes.edit', compact('note', 'tags'));
    }
    
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());
        $note->tags()->sync($request->input('tags', []));
        return redirect()->route('notes.index');
    }


    public function destroy($id)
    {
      $note = Note::find($id);
      $note->delete();
      return redirect('/notes');
    }

}


