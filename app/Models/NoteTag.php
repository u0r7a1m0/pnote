<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Note extends Model
class NoteTag extends Model
{
    protected $table = 'note_tags';
    use HasFactory;

    public $fillable = [
        'tag_id',
        'note_id',
    ];
    
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
    
    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class);
    }
}
$notes = DB::table('notes')
    ->join('note_tags', 'notes.id', '=', 'note_tags.note_id')
    ->join('tags', 'note_tags.tag_id', '=', 'tags.id')
    ->where('tags.name', '=', $tagName)
    ->select('notes.*')
    ->get();
