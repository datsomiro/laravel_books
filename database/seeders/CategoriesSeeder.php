<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Category;
        $c->name = "Biographies";
        $c->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Historical";
        $s->save();

        $b = new Book;
        $b->title = "Shade: A Tale of Two Presidents";
        $b->authors = "Pete Souza";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41IgIfhXb0L._AC_US436_FMwebp_QL65_.jpg";
        $b->category_id = $c->id;
        $b->subcategory_id = $s->id;
        $b->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Travelers & Explorers";
        $s->save();

        $b = new Book;
        $b->title = "Into the Wild";
        $b->authors = "Jon Krakauer";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/51rJVzn7lsL._AC_US436_FMwebp_QL65_.jpg";
        $b->category_id = $c->id;
        $b->subcategory_id = $s->id;
        $b->save();


        $c = new Category;
        $c->name = "Business & Investing";
        $c->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Management & Leadership";
        $s->save();

        $b = new Book;
        $b->title = "Leadership Strategy and Tactics: Field Manual";
        $b->authors = "Jocko Willink";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41f1H2rgSoL._AC_US436_FMwebp_QL65_.jpg";
        $b->category_id = $c->id;
        $b->subcategory_id = $s->id;
        $b->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Economics";
        $s->save();

        $c = new Category;
        $c->name = "Sci-Fi & Fantasy";
        $c->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Fantasy";
        $s->save();

        $b = new Book;
        $b->title = "Dune (Dune Chronicles, Book 1)";
        $b->authors = "Frank Herbert";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41UZeCEKOBL._AC_US436_FMwebp_QL65_.jpg";
        $b->category_id = $c->id;
        $b->subcategory_id = $s->id;
        $b->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Sci-Fi";
        $s->save();

        $b = new Book;
        $b->title = "1984";
        $b->authors = "George Orwell, Erich Fromm";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41aM4xOZxaL._AC_US436_FMwebp_QL65_.jpg";
        $b->category_id = $c->id;
        $b->subcategory_id = $s->id;
        $b->save();

    }
}
