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
        factory('App\User', 1)->create()->each(function($user){
            $user->posts()->save(factory('App\Post')->make());
            // userを作るときに同時にpostも作成。userとpostは外部キーでつながっている。
        });
    }
}
