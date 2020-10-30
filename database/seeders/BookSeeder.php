<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = new Book;
        $b->title = 'The Hunger Games';
        $b->authors = 'Suzanne Collins';
        $b->image = 'https://images.gr-assets.com/books/1447303603m/2767052.jpg';
        $b->save();

        $b = new Book;
        $b->title = 'Harry Potter and the Philosopher\'s Stone';
        $b->authors = 'J.K. Rowling, Mary GrandPré';
        $b->image = 'https://images.gr-assets.com/books/1474154022m/3.jpg';
        $b->save();

        $b = new Book;
        $b->title = 'Twilight';
        $b->authors = 'Stephenie Meyer';
        $b->image = 'https://images.gr-assets.com/books/1361039443m/41865.jpg';
        $b->save();

        $b = new Book;
        $b->title = 'To Kill a Mockingbird';
        $b->authors = 'Harper Lee';
        $b->image = 'https://images.gr-assets.com/books/1361975680m/2657.jpg';
        $b->save();
    }
}
