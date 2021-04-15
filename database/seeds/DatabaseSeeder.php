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
        App\Organizer::create([
            'name' => 'Bestrail',
            'username' => 'bestrail2021',
            'password' => bcrypt('Bestrail!'),
            'telephone' => 608569842,
            'email' => 'bestrail@gmail.com'
        ]);

        //factory(App\User::class, 4)->create();
        factory(App\Race::class, 30)->create();
        factory(App\Product::class, 10)->create();
        // $this->call(UserSeeder::class);
    }
}
