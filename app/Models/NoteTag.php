<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
