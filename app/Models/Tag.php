<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
    ]; 
    public function note_tags(): HasMany
    {
        return $this->hasMany(NoteTag::class);
    }
}
