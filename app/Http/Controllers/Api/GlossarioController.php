<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class GlossarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::with('tags')->with('links')->get();

        return response()->json($words);
    }

    public function show(string $word)
    {
        $word = Word::with('tags')->with('links')->find($word);

        if (!$word) return response(null, 404);

        return response()->json($word);
    }
}
