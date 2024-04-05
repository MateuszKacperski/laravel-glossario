<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
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
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|string',

        ], [
            'name.required' => 'Inserisci il nome del link',
            'url.required' => 'Inserisci l\'url del link',
            'name.string' => 'Il formato del nome non è corretto',
            'url.string' => 'Il formato del link non è corretto',

        ]);

        $data = $request->all();

        $link = new Link();

        $link->fill($data);
        $link->save();

        return to_route('admin.links.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
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
            'name' => 'required|string',
            'url' => 'required|string',

        ], [
            'name.required' => 'Inserisci il nome del link',
            'url.required' => 'Inserisci l\'url del link',
            'name.string' => 'Il formato del nome non è corretto',
            'url.string' => 'Il formato del link non è corretto',

        ]);

        $data = $request->all();
        $link->update($data);

        return to_route('admin.links.edit', $link->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
