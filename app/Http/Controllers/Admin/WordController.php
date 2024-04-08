<?php

namespace App\Http\Controllers\Admin;

use App\Models\Word;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Tag;
use Illuminate\Support\Arr;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::all();
        return view('admin.words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $word = new Word();
        $tags = Tag::select('label', 'id')->get();
        return view('admin.words.create', compact('word', 'tags'));
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

        if (Arr::exists($data, 'tags')) {
            $word->tags()->attach($data['tags']);
        }

        if($data['link']) {
            $new_link = new Link();
            $new_link->word_id = $word->id;
            $new_link->url = $data['link'];
            $new_link->name = $data['title'];

            $new_link->save();
        }

        return to_route('admin.words.show', $word);
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
        $previous_tags = $word->tags->pluck('id')->toArray();
        return view('admin.words.edit', compact('word', 'tags', 'previous_tags'));
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

        if(!Arr::exists($data, 'tags')) {
            $word->tags()->detach();
        }
        if (Arr::exists($data, 'tags')) {
            $word->tags()->sync($data['tags']);
        }

        $word->links()->delete();

        if ($data['link']) {
            $new_link = new Link();
            $new_link->word_id = $word->id;
            $new_link->url = $data['link'];
            $new_link->name = $data['title'];

            $new_link->save();
        }

        return to_route('admin.words.show', $word);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $word->delete();
        return to_route('admin.words.index');
    }
}
