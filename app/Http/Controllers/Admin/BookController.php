<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all books ordered by id
        $books = Book::orderBy('id')->get();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        // get a collection of ids of genres that this book belongs to
        $book_genre_ids = $book->genres->pluck('id');

        $genres = Genre::orderBy('name')->get();

        return view('admin.books.edit', compact('book', 'genres', 'book_genre_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ], [
            'title.required' => 'Every book needs a title.',
        ]);

        // get ids of genres whose checkboxes were checked in the form
        $ids_of_genres = array_keys($request->input('genre'));

        $book = Book::findOrFail($id);

        $book->title = $request->input('title');

        $book->save();

        //                    e.g. [1, 5, 6]
        $book->genres()->sync($ids_of_genres);

        return redirect()->route('admin.books.edit', $book->id)
            ->with('success_message', 'Book saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
