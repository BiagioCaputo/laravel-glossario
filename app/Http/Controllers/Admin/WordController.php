<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Word;
use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->query('search');
        //$words = Word::where('title', "%$search%")->get();
        $tag_filter = $request->query('tag_filter');

        $links = Link::all();

        $words = Word::tagFilter($tag_filter)
            ->where('title', 'LIKE', "%$search%")
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        $tags = Tag::select('id','label')->get();

        return view('admin.words.index', compact('words', 'search', 'tag_filter', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $word = new Word();

        $tags = Tag::select('label', 'id')->get();

        $links = []; // Passa un array vuoto per non mandare in errore il form nel create e sfruttandolo per un if

        return view('admin.words.create', compact('word', 'tags', 'links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Word $word)
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

        // Aggiungi nuovi link
        if (!empty($data['new_links'])) {
            foreach ($data['new_links'] as $newLinkData) {
                if (!empty($newLinkData['label']) && !empty($newLinkData['url'])) {
                    $newLink = new Link();
                    $newLink->word_id = $word->id;
                    $newLink->label = $newLinkData['label'];
                    $newLink->url = $newLinkData['url'];
                    $newLink->save();
                }
            }
        }


        if (Arr::exists($data, 'tags')) {
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
        $data = $request->all();

        $request->validate(
            [
                'title' => ['required', 'string', Rule::unique('words')->ignore($word->id)],
                'definition' => 'required|string',
                'tags' => 'nullable|exists:tags,id',
                'links.*.label' => 'nullable|string',
                'links.*.url' => 'nullable|url',
                'new_links.*.label' => 'nullable|string',
                'new_links.*.url' => 'nullable|url',
            ],
            [
                'title.required' => 'Nessuna parola inserita',
                'definition.required' => 'La nuova parola deve contenere una descrizione',
                'tags.exists' => 'Tag scelti non esistenti o non validi',
                'links.*.label.unique' => 'Uno dei link esiste già',
                'links.*.url.unique' => 'Uno degli url esiste già',
                'new_links.*.label.unique' => 'Uno dei link esiste già',
                'new_links.*.url.unique' => 'Uno degli url esiste già',
            ]
        );

        $word->fill($data);
        $word->slug = Str::slug($data['title']);
        $word->save();

        // Elimina tutti i link esistenti
        $word->links()->delete();

        // Prende i dati dal modulo dei link già esistenti
        if (isset($data['links'])) {
            foreach ($data['links'] as $linkData) {
                if (!empty($linkData['label']) && !empty($linkData['url'])) {
                    $link = new Link();
                    $link->word_id = $word->id;
                    $link->fill($linkData);
                    $link->save();
                }
            }
        }

        //Prende i dati dal modulo dei nuovi link utilizzato anche dallo store
        if (isset($data['new_links'])) {
            foreach ($data['new_links'] as $newLinkData) {
                if (!empty($newLinkData['label']) && !empty($newLinkData['url'])) {
                    $newLink = new Link();
                    $newLink->word_id = $word->id;
                    $newLink->fill($newLinkData);
                    $newLink->save();
                }
            }
        }

        //se ho inviato uno o dei valori sincronizzo
        if (isset($data['tags'])) $word->tags()->sync($data['tags']);

        //Se non ho inviato valori ma la word ne aveva in precedenza, vuol dire che devo eliminare valore perchè li ho tolti tutti
        elseif (!isset($data['tags']) && $word->has('tags')) $word->tags()->detach();

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

    //soft delete
    public function trash()
    {
        $words = Word::onlyTrashed()->get();
        return view('admin.words.trash', compact('words'));
    }

    public function restore(string $id)
    {
        $word = Word::onlyTrashed()->findOrFail($id);
        $word->restore();
        return to_route('admin.words.index')->with('type', 'success')->with('message', 'Progetto ripristinato con successo');
    }
    public function drop(string $id)
    {
        $word = Word::onlyTrashed()->findOrFail($id);
        $word->forceDelete();
        return to_route('admin.words.trash')->with('type', 'danger')->with('message', 'Progetto eliminato definitivamente');
    }
}
