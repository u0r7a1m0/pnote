<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function notes()
    {
        return $this->belongsToMany(Note::class, 'note_tags');
    }
    
}
