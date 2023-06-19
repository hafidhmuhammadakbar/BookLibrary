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
        User::factory(7)->create();

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

        Publisher::create([
            'name' => 'Penguin Random House',
            'slug' => 'penguin-random-house',
            'address' => '1745 Broadway, New York, NY 10019, United States',
            'phone' => '+1 212-782-9000',
        ]);
        Publisher::create([
            'name' => 'Hachette Livre',
            'slug' => 'hachette-livre',
            'address' => '43 Quai de Grenelle, 75015 Paris, France',
            'phone' => '+33 1 43 92 30 00',
        ]);
        Publisher::create([
            'name' => 'HarperCollins',
            'slug' => 'harpercollins',
            'address' => '195 Broadway, New York, NY 10007, United States',
            'phone' => '+1 212-207-7000',
        ]);
        Publisher::create([
            'name' => 'Macmillan Publishers',
            'slug' => 'macmillan-publishers',
            'address' => '120 Broadway, New York, NY 10271, United States',
            'phone' => '+1 646-307-5151',
        ]);

        Book::factory(30)->create();
    }
}
