<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Loads a homepage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }
}
