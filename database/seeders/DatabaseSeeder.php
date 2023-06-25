<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(7)->create([
            'role' => 'writer',
        ]);

        User::factory(7)->create([
            'role' => 'reader',
        ]);

        Category::create([
            'name' => 'Fiction',
            'slug' => 'fiction',
        ]);
        Category::create([
            'name' => 'Non-Fiction',
            'slug' => 'non-fiction',
        ]);
        Category::create([
            'name' => 'Children',
            'slug' => 'children',
        ]);
        Category::create([
            'name' => 'Fantasy',
            'slug' => 'fantasy',
        ]);
        Category::create([
            'name' => 'Romance',
            'slug' => 'romance',
        ]);
        Category::create([
            'name' => 'Mystery',
            'slug' => 'mystery',
        ]);
        Category::create([
            'name' => 'Horror',
            'slug' => 'horror',
        ]);
        Category::create([
            'name' => 'Thriller',
            'slug' => 'thriller',
        ]);
        Category::create([
            'name' => 'Historical Fiction',
            'slug' => 'historical-fiction',
        ]);

        Publisher::factory(6)->create();

        Book::factory(30)->create();
    }
}
