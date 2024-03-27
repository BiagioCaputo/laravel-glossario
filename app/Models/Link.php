<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    //Per ogni word posso avere più link
    public function word() 
    {
        return $this->belongsTo(Word::class);
    }
}
