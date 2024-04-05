<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Word;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::all();
        $words = Word::orderByDesc('updated_at')->orderByDesc('created_at')->paginate(5);
        return view('admin.words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $word = new Word();

        return view('admin.words.create', compact('word'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [ 
                'title' => 'required|string|unique:words',
                'definition' => 'required|string',
                'links.*.label' => 'nullable|string',
                'links.*.url' => 'nullable|string',
            ],
            [
                'title.required' => 'Nessuna parola inserita',
                'definition.required' => 'La nuova parola deve contenere una descrizione',
            ]
        );

        $data = $request->all();

        $word = new Word();

        $word->fill($data);

        $word->slug = Str::slug($word->title);


        $word->save();

        return to_route('admin.words.index', $word->id)->with('message', "Nuova parola creata: $word->title")->with('word', "success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        return view('admin.words.show', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word)
    {
        return view('admin.words.edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Word $word)
    {
        $request->validate(
            [
                'title' => ['required', 'string', Rule::unique('words')->ignore($word->id)],
                'definition' => 'required|string',
            ],
            [
                'title.required' => 'Nessuna parola inserita',
                'definition.required' => 'La nuova parola deve contenere una descrizione',
            ]
        );

        $data = $request->all();

        $data['slug'] = Str::slug($data['title']);

        $word->update($data);

        return to_route('admin.words.show', $word->id)->with('type', 'success')->with('message', 'Parola modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $word->delete();
        return to_route('admin.words.index')->with('type', 'danger')->with('message', 'Parola eliminata con successo');
    }
}
