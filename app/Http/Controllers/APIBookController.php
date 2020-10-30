<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIBookController extends Controller
{
    public function index()
    {
        // the logic of your api will be here
//        $books = \DB::select('SELECT * from `books`');
//        return $books;

        $books = DB::select('SELECT * from `books` limit ? offset ?', [2, 1]);
        return $books;
        return 'Hello world';
    }
}
