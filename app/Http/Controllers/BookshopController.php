<?php

namespace App\Http\Controllers;

use App\Models\Bookshop;
use Illuminate\Http\Request;

class BookshopController extends Controller
{
    public function index()
    {
        $bookshops = Bookshop::get();
        return view('bookshops/index', compact('bookshops'));
    }

    public function create()
    {
        return view('bookshops/create');
    }

    public function store(Request $request)
    {
        $bookshop = new Bookshop;

        $bookshop->name = $request->input('name');
        $bookshop->city = $request->input('city');

        $bookshop->save();

        return redirect(
            action('BookshopController@index')
        );
    }
}
