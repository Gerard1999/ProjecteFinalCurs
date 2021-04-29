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
        
        //Crear un Usuari predeterminat
        App\User::create([
            'name' => 'Bestrail',
            'user_type' => 'organizer',
            'email' => 'best@trail.com',
            'nif' => 'G44346729',
            'password' => bcrypt('12341234'),
            'telephone' => 689482945,
            'address' => 'Avinguda Diagonal 244',
            'city' => 'Barcelona',
            ]);
            
        //Crear un Organitzador predeterminat
        App\Organizer::create([
            'user_id' => 1,
            'link_web' => 'besttrail.cat',
            'link_facebook' => 'www.facebook.com/besttrail',
            'link_instagram' => 'www.instagram.com/besttrail',
            ]);

        //Crear una Cursa predeterminada
        App\Race::create([
            'organizer_id' => 1,
            'name' => 'Entrevalls',
            'description' => "Vols gaudir un dia de trail running en un entorn privilegiat d'alta muntanya? La propera edició de l'Entrevalls es la teva excusa perfecta! El pròxim dia 7 de setembre torna a les valls del Ter i del Freser una nova jornada de running per la muntanya que no deixarà indiferent a cap participant. No us poder exclosos en aquest magnífic esdeveniment i és per això que existeixen quatre modalitats diferents que s'adapten a tot tipus de corredors.",
            'url' => "entrevalls",
            'shirt' => true,
            'date' => '2021-09-07',
            'location' => 'Setcases',
            'img_cover' => 'races\DZTMYto8g8wLDen4NdAH2YAS9fzPgpTxZQAzrPd9.jpg',
            ]);

        App\Size::create([
            's' => true,
            'm' => true,
            'l' => true,
        ]);

        App\Product::create([
            'name' => 'Samarreta tècnica Salomon',
            'description' => 'Samarreta tècnia Salomon de trail running. LLeugeresa i transpirabilitat',
            'price' => 14.99,
            'link_photo' => 'products/samarretaSalomon.jpg',
            'size_id' => 1,
            'organizer_id' => 1,
        ]);
    }
}
