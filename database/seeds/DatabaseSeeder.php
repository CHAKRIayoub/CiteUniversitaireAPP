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

        DB::table('users')->insert([
            'name' => 'employée',
            'email' => 'employe@gmail.com',
            'role' => 'employe',
            'password' => bcrypt('password')
        ]);

        DB::table('users')->insert([
            'name' => 'etudiant',
            'email' => 'etudiant@gmail.com',
            'role' => 'etudiant',
            'password' => bcrypt('password')
        ]);

        DB::table('villes')->insert([
            'ville' => 'Agadir',
            'distance' => 700
        ]);

        DB::table('villes')->insert([
            'ville' => 'Ait Baha',
            'distance' => 200
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Al Hoceïma',
            'distance' => 300
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Aoulouz',
            'distance' => 500
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Assa',
            'distance' => 900
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Azrou',
            'distance' => 365
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Béni Mellal',
            'distance' => 400
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Berkane',
            'distance' => 500
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Biougra',
            'distance' => 434
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Casablanca',
            'distance' => 400
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Chichaoua',
            'distance' => 300
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Essaouira',
            'distance' => 1000
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Fès',
            'distance' => 250
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Guelmim',
            'distance' => 1100
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Ifrane',
            'distance' => 375 
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Imi n tanout',
            'distance' => 589
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Inzegane',
            'distance' => 809
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Kelaa sraghna',
            'distance' => 198
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Kenitra',
            'distance' => 203
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Khemissat',
            'distance' => 309
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Khénifra',
            'distance' => 498
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Marrakech',
            'distance' => 595
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Ouarzazate',
            'distance' => 598
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Ouezzane',
            'distance' => 150
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Oulad berhil',
            'distance' => 398
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Rabat',
            'distance' => 298
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Salé',
            'distance' => 295
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Settat',
            'distance' => 420
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Souk El Arbaa',
            'distance' => 200
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Tafraout',
            'distance' => 500
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Tanger',
            'distance' => 50
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Tantan',
            'distance' => 1090
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Taroudant',
            'distance' => 890
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Tiflet',
            'distance' => 300
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Tiznit',
            'distance' => 800
        ]);
        
        DB::table('villes')->insert([
            'ville' => 'Zag',
            'distance' => 1600
        ]);
        DB::table('villes')->insert([
            'ville' => 'Tetouan',
            'distance' => 0
        ]);

        DB::table('regles')->insert([
                'nom' => 'revenue',
                'factor' => 2
            ]
        );

        DB::table('regles')->insert([
                'nom' => 'nb_enfants',
                'factor' => 2
            ]
        );

         DB::table('regles')->insert([
                'nom' => 'mention',
                'factor' => 3
            ]
        );
          DB::table('regles')->insert([
                'nom' => 'maladie',
                'factor' => 2
            ]
        );
           DB::table('regles')->insert([
                'nom' => 'handicape',
                'factor' => 2
            ]
        );
            DB::table('regles')->insert([
                'nom' => 'distance',
                'factor' => 3
            ]
        );
    }
}
