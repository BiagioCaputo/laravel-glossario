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
        $words = Word::select('id', 'title', 'slug', 'definition')->with('tags', 'links')->paginate(32);


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
    public function show(string $slug)
    {

        $word = Word::select('*')->with('tags', 'links')->whereSlug($slug)->first();

        if (!$word) return response(null, 404);

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
