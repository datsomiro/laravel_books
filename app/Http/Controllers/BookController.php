<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * display a list of all books
     */
    public function index()
    {
//        $books = DB::select('SELECT * from `books`');

        $books = Book::with('reviews')->get();

        return view('books/index', compact('books'));
    }

    public function show($id)
    {
//        $book = DB::select('SELECT * from `books` where `id` = ?', [$id]);
        //        $book = $book[ 0 ];

        // select * from `books` ... - superfast, but review would require another DB query
        //        $book = Book::findOrFail($id);

        // select * from `books` join `reviews` - slow, but selects also reviews
        $book = Book::with('reviews')->findOrFail($id);

//        $reviews = Review::where('book_id', $book->id)->get();
        //        $reviews = $book->reviews;
        //
        //        return $reviews;

        return view('books/show', compact('book'));
    }

    public function create()
    {
        return view('books/create');
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');

        $book->save();

        //after storing new book we will redirect our user to action('BookController@index')
        return redirect(action('BookController@index'));
    }

    public function storeReview($book_id, Request $request)
    {
        // This is Gandalf : You shall not pass!
        $this->validate($request, [
            'text' => 'required|string|max:255', // '101' -> length = 3 < 255 - success

            'rating' => 'required|numeric|min:0|max:100', // 101 > 100 - failed
        ]);

        // code here will be executed only if validation did not fail

        $book = Book::findOrFail($book_id);

        $review = new Review;
        $review->book_id = $book->id;
//        $review->book_id = $book_id;
        $review->text = $request->input('text');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect(action('BookController@show', [$book->id]));
    }

    /**
     * handles submission of the "add to order"
     * form in the book detail
     */
    public function addToOrder(Request $request, $book_id)
    {
        // $this->validate($request, [
        Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1',
        ], [
            'quantity.required' => 'Hey, don\'t forget the quantity!',
            'quantity.min' => 'Value is too low! Go higher!',
        ])->validateWithBag('addtoorder'); // adds all potential errors to MessageBag named 'addtoorder'
        // ])->validate();                 // adds all potential errors to MessageBag named 'default'

        // handle the submission
        $order = new Order;
        // TODO: attach user_id to this order
        // $order->user_id = \Auth::id();
        $order->save(); // assign an id to the order

        $book = Book::findOrFail($book_id);

        $quantity = $request->input('quantity'); // 10

        // need a record in book_order
        // that has book_id = 1
        // that has order_id = 1
        // INSERT INTO `book_order` (`book_id`, `order_id`, `quantity) VALUES (1, 1, 10)
        $order->books()->attach($book, ['quantity' => $quantity]);

        // flash the success message
        session()->flash('order_success_message', 'Book ' . $book->title . ' was added to the cart');

        // redirect somewhere (with GET)
        return redirect()->route('books.show', $book->id);
    }
}
