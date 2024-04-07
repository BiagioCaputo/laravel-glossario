<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function abstract()
    {
        return substr($this->definition, 1, 200);
    }
}
