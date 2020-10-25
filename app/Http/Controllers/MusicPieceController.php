<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;

class MusicPieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('slug', Str::ucfirst(request()->segment(1)))->firstOrFail();
        $categories = Category::all();

        return view('music.index', [
            'categories' => $categories,
            'category' => $category,
        ]);
    }
}
