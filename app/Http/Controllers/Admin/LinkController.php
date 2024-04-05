<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::orderByDesc('updated_at')->orderByDesc('created_at')->paginate(10);

        return view('admin.links.index', compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'label' => ['required', 'string', Rule::unique('links')->ignore($link->id)],
            'url' => 'required|string'
        ], [
            'label.required' => 'Nessun label inserito',
            'url.required' => 'Nessun url inserito'
        ]);

        $data = $request->all();

        $link->update($data);

        return to_route('admin.links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('admin.links.index');
    }
}
