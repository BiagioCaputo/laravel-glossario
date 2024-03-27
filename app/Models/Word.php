<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'definition'];

    //Ogni Progetto può avere un solo type
    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
