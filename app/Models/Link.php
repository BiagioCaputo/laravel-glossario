<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'url'];

    //Per ogni word posso avere più link
    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}
