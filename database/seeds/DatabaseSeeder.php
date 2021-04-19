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
        //Crear un Organitzador predeterminat
        App\Organizer::create([
            'name' => 'Bestrail',
            'username' => 'bestrail2021',
            'password' => bcrypt('Bestrail!'),
            'telephone' => 608569842,
            'email' => 'bestrail@gmail.com'
        ]);
        
        //Crear un Usuari predeterminat
        App\User::create([
            'name' => 'Gerard',
            'email' => 'gerardlopo@gmail.com',
            'password' => bcrypt('12341234'),
        ]);
        
        //Crear una Cursa predeterminada
        App\Race::create([
            'organizer_id' => 1,
            'name' => 'Entrevalls',
            'description' => "Vols gaudir un dia de trail running en un entorn privilegiat d'alta muntanya? La propera edició de l'Entrevalls es la teva excusa perfecta! El pròxim dia 7 de setembre torna a les valls del Ter i del Freser una nova jornada de running per la muntanya que no deixarà indiferent a cap participant. No us poder exclosos en aquest magnífic esdeveniment i és per això que existeixen quatre modalitats diferents que s'adapten a tot tipus de corredors.",
            'url' => "entrevalls-2021",
            'shirt' => true,
            'date' => '2021-09-07',
            'location' => 'Setcases',
            'img_cover' => 'shorturl.at/dgluM',
            ]);

        //factory(App\User::class, 4)->create();
        factory(App\Race::class, 30)->create();
        factory(App\Product::class, 10)->create();
        // $this->call(UserSeeder::class);
    }
}
