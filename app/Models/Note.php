<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'cord_txt',
        'url_txt',
        'public_status'

    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'note_tags');
    }
    
    public function note_tags(): HasMany
    {
        return $this->hasMany(NoteTag::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
