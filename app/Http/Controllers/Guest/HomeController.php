<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $words = Word::orderByDesc('created_at')->paginate(6);

        return view('guest.home', compact('words'));
    }

    public function show(Word $word)
    {

        return view('guest.words.show', compact('word'));
    }
}
