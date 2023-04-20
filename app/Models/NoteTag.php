<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteTag extends Model
{
    use HasFactory;
    public $fillable = [
        'tag_id',
        'note_id',
    ]; 
}

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class NoteTag extends Model
{
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class);
    }
}
