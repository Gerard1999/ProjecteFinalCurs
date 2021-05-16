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
            'name' => 'Gerard',
            'user_type' => 'runner',
            'email' => 'gerardlopo@gmail.com',
            'nif' => '77623668W',
            'password' => bcrypt('12341234'),
            'telephone' => 693211981,
            'address' => 'C/ Jaume Balmes, 75 1r 3a',
            'city' => 'Pineda de Mar',
            ]);

        //Crear un Usuari predeterminat
        App\Runner::create([
            'surname' => 'Lopez',
            'user_id' => 1,
            ]);

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
            'user_id' => 2,
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
        //Modalitats Cursa Entrevalls
        App\Category::create([
            'race_id' => 1,
            'name_category' => 'Short',
            'kms' => 12,
            'elevation_gain' => 600,
            'location_start' => 'Setcases',
            'location_finish' => 'Setcases',
            'start_time' => '9:00',
            'num_aid_station' => 1,
            'price' => 20,
            'max_participants' => 300,
        ]);
        App\Category::create([
            'race_id' => 1,
            'name_category' => 'Clàssica',
            'kms' => 30,
            'elevation_gain' => 1900,
            'location_start' => 'Setcases',
            'location_finish' => 'Setcases',
            'start_time' => '8:00',
            'num_aid_station' => 2,
            'price' => 30,
            'max_participants' => 200,
        ]);

        App\Size::create([
            's' => true,
            'm' => true,
            'l' => true,
        ]);
        
        //Creant Productes
        App\Product::create([
            'name' => 'Samarreta tècnica Scott',
            'description' => 'Samarreta tècnia Scott de trail running. LLeugeresa i transpirabilitat',
            'price' => 24.99,
            'link_photo' => 'products/scott.jpg',
            'size_id' => 1,
            'organizer_id' => 1,
        ]);
        App\Product::create([
            'name' => 'Samarreta tècnica Adidas',
            'description' => 'Samarreta tècnia Adidas de trail running. LLeugeresa i transpirabilitat',
            'price' => 19.99,
            'link_photo' => 'products/adidas.jpg',
            'size_id' => 1,
            'organizer_id' => 1,
        ]);
    }
}
