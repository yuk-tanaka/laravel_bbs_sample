<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create();

        factory(\App\Thread::class, 100)->create()
            ->each(function (\App\Thread $thread) {
                $thread->posts()->saveMany(factory(\App\Post::class, mt_rand(1, 3))->make());
            });
    }
}
