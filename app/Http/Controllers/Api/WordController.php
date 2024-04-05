<?php

namespace App\Http\Controllers\Api;

use App\Models\Word;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::select('id', 'title', 'slug', 'definition')->with('tags', 'links')->get();

        
        return response()->json($words);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $word)
    {

        $word = Word::select('id', 'title', 'type_id', 'description', 'image')->with('type', 'technologies')->find($project);

        if(!$word) return response(null, 404);

        return response()->json($word);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Word $word)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        //
    }
}

