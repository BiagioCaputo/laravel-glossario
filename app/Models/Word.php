<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'definition'];

    //Ogni Parola può avere più type
    public function links()
    {
        return $this->hasMany(Link::class);
    }

    //Ogni Parola può avere più tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
