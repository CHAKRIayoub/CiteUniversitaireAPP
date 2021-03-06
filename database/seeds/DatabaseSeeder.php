<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'administrateur',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);



         //les regles initiales



        DB::table('regles')->insert(['nom' => 'revenue','factor' => 2]);
        DB::table('regles')->insert(['nom' => 'nb_enfants','factor' => 2]);
        DB::table('regles')->insert(['nom' => 'mention','factor' => 3]);
        DB::table('regles')->insert(['nom' => 'maladie','factor' => 2]);
        DB::table('regles')->insert(['nom' => 'handicape','factor' => 2]);
        DB::table('regles')->insert(['nom' => 'distance','factor' => 3]);


        //conf dates


        DB::table('application')->insert([
                'date_d' => '2018-08-01',
                'date_f' => '2018-09-01'
            ]
        );



        //les villes



    DB::table('villes')->insert(['ville' => 'Addakla','distance' => 2098]);
    DB::table('villes')->insert(['ville' => 'Agadir','distance' => 910]);
    DB::table('villes')->insert(['ville' => 'Ait Baha','distance' => 863]);
    DB::table('villes')->insert(['ville' => 'Al Hoceïma','distance' => 278]);
    DB::table('villes')->insert(['ville' => 'Aoulouz','distance' => 1000]);
    DB::table('villes')->insert(['ville' => 'Assa','distance' => 1100]);
    DB::table('villes')->insert(['ville' => 'Azrou','distance' => 340]);
    DB::table('villes')->insert(['ville' => 'Béni Mellal','distance' => 523]);
    DB::table('villes')->insert(['ville' => 'Berkane','distance' => 421]);
    DB::table('villes')->insert(['ville' => 'Biougra','distance' => 831]);
    DB::table('villes')->insert(['ville' => 'Boujdour','distance' => 489]);
    DB::table('villes')->insert(['ville' => 'Casablanca','distance' => 366]);
    DB::table('villes')->insert(['ville' => 'Chichaoua','distance' => 660]);
    DB::table('villes')->insert(['ville' => 'Essaouira','distance' => 760]);
    DB::table('villes')->insert(['ville' => 'Fès','distance' => 260]);
    DB::table('villes')->insert(['ville' => 'Guelmim','distance' => 1007]);
    DB::table('villes')->insert(['ville' => 'Ifrane','distance' => 319 ]);
    DB::table('villes')->insert(['ville' => 'Imi n tanout','distance' => 696]);
    DB::table('villes')->insert(['ville' => 'Inzegane','distance' => 822]);
    DB::table('villes')->insert(['ville' => 'Kelaa sraghna','distance' => 580]);
    DB::table('villes')->insert(['ville' => 'Kenitra','distance' => 250]);
    DB::table('villes')->insert(['ville' => 'Khemissat','distance' => 290]);
    DB::table('villes')->insert(['ville' => 'Khénifra','distance' => 430]);
    DB::table('villes')->insert(['ville' => 'Marrakech','distance' => 603]);
    DB::table('villes')->insert(['ville' => 'Ouarzazate','distance' => 757]);
    DB::table('villes')->insert(['ville' => 'Ouezzane','distance' => 130]);
    DB::table('villes')->insert(['ville' => 'Oulad berhil','distance' => 398]);
    DB::table('villes')->insert(['ville' => 'Rabat','distance' => 298]);
    DB::table('villes')->insert(['ville' => 'Salé','distance' => 295]);
    DB::table('villes')->insert(['ville' => 'Settat','distance' => 420]);
    DB::table('villes')->insert(['ville' => 'Souk El Arbaa','distance' => 200]);
    DB::table('villes')->insert(['ville' => 'Tafraout','distance' => 500]);
    DB::table('villes')->insert(['ville' => 'Tanger','distance' => 50]);
    DB::table('villes')->insert(['ville' => 'Tantan','distance' => 1090]);
    DB::table('villes')->insert(['ville' => 'Taroudant','distance' => 890]);
    DB::table('villes')->insert(['ville' => 'Tiflet','distance' => 300]);
    DB::table('villes')->insert(['ville' => 'Tiznit','distance' => 800]);
    DB::table('villes')->insert(['ville' => 'Zag','distance' => 1600]);
    DB::table('villes')->insert(['ville' => 'Tetouan','distance' => 0]);




    }
}
