<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderByDesc('updated_at')->orderByDesc('created_at')->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$request->validate(
            [ 
                'label' => 'required|string|unique:tags',
                'color' => 'string|nullable',
            ],
            [
                'label.required' => 'Nessuna parola inserita',
                'color.string' => 'Il colore del tag deve essere una stringa',
            ]
        );

        $data = $request->all();

        $tag = new tag();

        $tag->fill($data);

        $tag->slug = Str::slug($tag->label);


        $tag->save();

        return to_route('admin.tags.index', $tag->id)->with('message', "Nuovo Tag creato: $tag->label")->with('tag', "success"); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(

            [ 
                'label' => ['required', 'string', Rule::unique('tags')->ignore($tag->id)],
                'color' => 'string|nullable',
            ],
            [
                'label.required' => 'Nessuna parola inserita',
                'color.string' => 'Il colore del tag deve essere una stringa',
            ]
        );

        $data = $request->all();

        $data['slug'] = Str::slug($data['label']);

        $tag->update($data);

        return to_route('admin.tags.index', $tag->id)->with('type', 'success')->with('message', 'Tag modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return to_route('admin.tags.index')->with('type', 'danger')->with('message', 'Tag eliminato con successo');
    }
}
