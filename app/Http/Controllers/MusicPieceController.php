<?php

namespace App\Http\Controllers;

class MusicPieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('music.index');
    }
}
