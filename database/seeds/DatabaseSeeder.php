<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $domains = [
            ['label' => 'Film'],
            ['label' => 'Astronomie'],
            ['label' => 'Automobile'],
            ['label' => 'Cuisine'],
            ['label' => 'Jardinage'],
            ['label' => 'Sport'],
            ['label' => 'Langues'],
            ['label' => 'Bâtiments'],
            ['label' => 'Boulangerie'],
            ['label' => 'Psychologie'],
            ['label' => 'Informatique'],
            ['label' => 'Art'],
            ['label' => 'Histoire'],
            ['label' => 'Géographie'],
            ['label' => 'Phylosophie'],
            ['label' => 'Mathématiques'],
            ['label' => 'Electricité'],
            ['label' => 'Physique/Chimie'],
            ['label' => 'Argent'],
            ['label' => 'Restauration'],
            ['label' => 'Agriculture'],
            ['label' => 'Religion'],
            ['label' => 'Commerce'],
            ['label' => 'Presse'],
            ['label' => 'Santé'],
            ['label' => 'Mode'],
            ['label' => 'Communication'],
            ['label' => 'Jeux-Vidéos'],
            ['label' => 'Logistiques'],
            ['label' => 'Sciences'],
        ];

        DB::table('domains')->insert($domains);

        $roles = [
            ['name' => 'membre'],
            ['name' => 'modérateur'],
            ['name' => 'Admin'],
        ];

        DB::table('roles')->insert($roles);

        $users = [
            [
                'name' => 'Admin',
                'password' => bcrypt('123456'),
                'email' => 'admin@test.com',
                'roles_id' => 3,
                //'avatar' => "1/jhin (2).jpg",
            ],
            [
                'name' => 'Anthony',
                'password' => bcrypt('123456'),
                'email' => 'anthony@test.com',
                'roles_id' => 1,
                //'avatar' => "1/jhin (2).jpg",
            ],
            [
                'name' => 'Kevin',
                'password' => bcrypt('123456'),
                'email' => 'kevin@test.com',
                'roles_id' => 1,
                //'avatar' => "1/jhin (2).jpg",
            ],
            [
                'name' => 'Paul',
                'password' => bcrypt('123456'),
                'email' => 'paul@test.com',
                'roles_id' => 1,
                //'avatar' => "1/jhin (2).jpg",
            ],
        ];

        DB::table('users')->insert($users);

        $questions = [
            ['content' => 'Gneu gneu le soleil, il est chaud ???', 'video_path' => "path",'users_id' => 2, 'domains_id' => 2],
            ['content' => 'Pourquoi jujutsu est top1, vente, animé, personnage, animation, combat ?', 'video_path' => "path",'users_id' => 4, 'domains_id' => 1],
            ['content' => 'Comment développer en JAVA ?', 'video_path' => "path",'users_id' => 3, 'domains_id' => 4],
        ];

        DB::table('questions')->insert($questions);

        $answers = [
            ['ans_content' => 'Gneu gneu le soleil, ah bon ?', 'video_path' => "path",'users_id' => 4, 'questions_id' => 1, 'answer_id' => null],
            ['ans_content' => 'parce que cest bien', 'video_path' => "path",'users_id' => 3, 'questions_id' => 2, 'answer_id' => null],
            ['ans_content' => 'parce que cest bien 2', 'video_path' => "path",'users_id' => 3, 'questions_id' => 2, 'answer_id' => 2],
            ['ans_content' => 'renseigne toi sur les bases', 'video_path' => "path",'users_id' => 2, 'questions_id' => 3, 'answer_id' => null],
        ];

        DB::table('answers')->insert($answers);

    }
}
