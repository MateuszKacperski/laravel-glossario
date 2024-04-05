<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|unique:tags',
            'color' => 'hex_color',
            
        ], [
            'label.required' => 'Inserisci l\'etichetta del tag',
            'color.hex_color' => 'Il formato del colore non è corretto',
            
        ]);

        $data = $request->all();
        
        $tag = new Tag();

        $tag->fill($data);
        $tag->save();

        return to_route('admin.tags.show', $tag->id)
            ->with('message', "Tipo '$tag->label' creato con successo!")
            ->with('tag', "success");
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
        $request->validate([
            'label' =>
            ['required', 'string', Rule::unique('tags')->ignore($tag->id)],
            'color' => 'requied|hex_color',

        ], [
            'label.required' => 'Inserisci l\'etichetta del tag',
            'color.hex_color' => 'Il formato del colore non è corretto',

        ]);

        $data = $request->all();
        $tag->update($data);

        return to_route('admin.tags.show', $tag->id)
            ->with('message', "Tag '$tag->label' modificato con successo!")
            ->with('tag', "info");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
