<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Word;
use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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

        $tags = Tag::select('label', 'id')->get();

        $links = Link::all(); 

        return view('admin.words.create', compact('word', 'tags', 'links'));
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
                'tags' => 'nullable|exists:tags,id',
                'links.*.label' => 'nullable|unique:links|string',
                'links.*.url' => 'nullable|unique:links|url',
            ],
            [
                'title.required' => 'Nessuna parola inserita',
                'definition.required' => 'La nuova parola deve contenere una descrizione',
                'tags.exists' => 'Tag scelti non esistenti o non validi',
                'links.*.label.unique' => 'Uno dei link esiste già',
                'links.*.url.unique' => 'Uno degli url esiste già',
            ]
        );

        $data = $request->all();

        $word = new Word();

        $word->fill($data);

        $word->slug = Str::slug($word->title);


        $word->save();

        // Salvataggio dei link associati alla parola, nel caso non trovasse nulla in input, invierà un array vuoto invece di generare un errore
        foreach ($request->input('links', []) as $link) { 
            $newLink = new Link();
            $newLink->label = $link['label'];
            $newLink->url = $link['url'];
            $newLink->word_id = $word->id;
            $newLink->save();
        }

        if(Arr::exists($data, 'tags')) 
        {
            $word->tags()->attach($data['tags']);
        }

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
        $tags = Tag::select('label', 'id')->get();

        //Ricavo le tecnologie utilizzate dal progetto prima di modificarlo cosi da utilizzarle nell'old nel form
        $previous_tags = $word->tags->pluck('id')->toArray();

        //carico i link associati alla parola
        $links = $word->links;

        return view('admin.words.edit', compact('word', 'tags', 'previous_tags', 'links'));
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
                'tags' => 'nullable|exists:tags,id',
                'links.*.label' => 'nullable|unique:links|string',
                'links.*.url' => 'nullable|unique:links|url',
            ],
            [
                'title.required' => 'Nessuna parola inserita',
                'definition.required' => 'La nuova parola deve contenere una descrizione',
                'tags.exists' => 'Tag scelti non esistenti o non validi',
                'links.*.label.unique' => 'Uno dei link esiste già',
                'links.*.url.unique' => 'Uno degli url esiste già',
            ]
        );

        $data = $request->all();

        $data['slug'] = Str::slug($data['title']);

        $word->update($data);

        //ciclo sui link ricevuti
        foreach ($request->input('links', []) as $link) {
            //se il link esisteva già lo modifico
            if (isset($link['id'])) {
                $existingLink = Link::findOrFail($link['id']);
                $existingLink->label = $link['label'];
                $existingLink->url = $link['url'];
                $existingLink->save();
            //altrimenti ne creo uno nuovo
            } else {
                $newLink = new Link();
                $newLink->label = $link['label'];
                $newLink->url = $link['url'];
                $newLink->word_id = $word->id;
                $newLink->save();
            }
        }

        //se ho inviato uno o dei valori sincronizzo 
        if (Arr::exists($data, 'tags')) $word->tags()->sync($data['tags']);

        //Se non ho inviato valori ma la word ne aveva in precedenza, vuol dire che devo eliminare valore perchè li ho tolti tutti
        elseif (!Arr::exists($data, 'tags') && $word->has('tags')) $word->tags()->detach();

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
