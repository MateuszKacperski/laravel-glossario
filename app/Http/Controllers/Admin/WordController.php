<?php

namespace App\Http\Controllers\Admin;

use App\Models\Word;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WordController extends Controller
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
        $word = new Word();
        return view('admin.words.create', compact('word'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'term' => 'required|string',
            'definition' => 'required|string'
        ], [
            'term.required' => 'Il titolo è obbligatorio',
            'definition.required' => 'La definizione è obbligatoria',
        ]);

        $data = $request->all();

        $word = new Word();

        $word->fill($data);

        $word->slug = Str::slug($word->term);

        $word->save();

        return to_route('admin.words.show', $word);
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        //
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

        $request->validate([
            'term' => 'required|string',
            'definition' => 'required|string'
        ], [
            'term.required' => 'Il titolo è obbligatorio',
            'definition.required' => 'La definizione è obbligatoria',
        ]);


        $data = $request->all();

        $data['slug'] = Str::slug($data['term']);

        $word->update($data);

        return to_route('admin.words.show', $word);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        //
    }
}
