<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Book;
use App\Models\Subcategory;
use App\Models\Category;

class EshopController extends Controller
{
    public function index()
    {
        $books      = DB::select('SELECT * FROM `books`');
        $categories = DB::select('SELECT * FROM `categories`');

        return view('eshop/index', compact('books', 'categories'));
    }

    public function category($id)
    {

//        return DB::select('SELECT * FROM `categories`');
//        return DB::table('categories')->get();

//         $category = DB::select('SELECT * FROM `categories` where `id` = ? ', [$id]);
//         $category = $category[0];

        $category = DB::table('categories')->where('id', $id)->first();

        if($category === null){
            return '404';
        }

        $subcategories = DB::table('subcategories')->where('category_id', $id)->get();

//        $categoryName = DB::table('categories')->where('id', $id)->value('name');

        $books = DB::table('books')->where('category_id', $id)->get();

//         get books matching category_id = $id and id > 5

//         $books = rows from table books where category_id = $id and id > 5
//         DB::table('books')->where('categories_id', $id)->where('id', '>', 5)->get();

//         $books = rows from table books where category_id = $id OR id > 5
//         DB::table('books')->where('categories_id', $id)->orWhere('id', '>', 5)->get();

//        A and (B or C)
//        DB::table('books')->where(A)->where(function($query) {
//            (B or C)
//            $query->where(B)->orWhere(C);
//        });


        return view('eshop/category', compact('category', 'subcategories', 'books'));
    }

    public function subcategory($id)
    {
//        created using `php artisan make:model Subcategory`
//        $subcategory = Subcategory::find($id);
//        Don't forget to `use App\Models\Subcategory;`
        $subcategory = Subcategory::findOrFail($id);

//        created using `php artisan make:model Category`
//        Don't forget to `use App\Models\Category;`
//        $category = Category::where('id', $subcategory->category_id)->first();
//        $category = Category::find($subcategory->category_id);

        $category_id = $subcategory->category_id;
//        $category = Category::where('id', $category_id)->first();
        $category = Category::find($category_id);

//        created using `php artisan make:model Book`
//        Don't forget to `use App\Models\Book;`
        $books = Book::where('subcategory_id', $subcategory->id)->get();

        return view('eshop/subcategory', compact('subcategory', 'category', 'books'));
    }

}
