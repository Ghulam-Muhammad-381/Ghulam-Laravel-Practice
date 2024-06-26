<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
// use App\Models\User;
// use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1000)->create();

        $this->call(EventSeeder::class);
        $this->call(AttendeeSeeder::class);





        // User::factory(10)->create();
        // \App\Models\User::factory(2)->unverified()->create();
        // \App\Models\Task::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Book::factory(33)->create()->each(function ($book) {
        //     $numReviews = random_int(5, 30);

        //     Review::factory()->count($numReviews)
        //         ->good()
        //         ->for($book)
        //         ->create();
        // });

        // Book::factory(33)->create()->each(function ($book) {
        //     $numReviews = random_int(5, 30);

        //     Review::factory()->count($numReviews)
        //         ->average()
        //         ->for($book)
        //         ->create();
        // });

        // Book::factory(33)->create()->each(function ($book) {
        //     $numReviews = random_int(5, 30);

        //     Review::factory()->count($numReviews)
        //         ->bad()
        //         ->for($book)
        //         ->create();
        // });
    }
}
