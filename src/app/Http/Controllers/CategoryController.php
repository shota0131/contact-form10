<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $contacts=Author::simplePaginate(7);
        return view('index', ['contacts'=>$contacts]);
}
}