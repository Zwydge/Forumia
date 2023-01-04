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
            ['label' => 'Philosophie'],
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
            ['label' => 'Jeux-Vidéos'],
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
            ]
        ];

        DB::table('users')->insert($users);

        $questions = [
            ['content' => 'Est-il vrai que l\'acteur dans John Wick réalise toutes ses cascades ?', 'video_path' => "path",'users_id' => 2, 'domains_id' => 1],
            ['content' => 'Serait-il possible en théorie d\'habiter sur mars ?', 'video_path' => "path",'users_id' => 3, 'domains_id' => 2],
            ['content' => 'Faut-il mieux prendre une voiture thermique ou éléctrique ?', 'video_path' => "path",'users_id' => 4, 'domains_id' => 3],
            ['content' => 'Comment préparer un bon dessert en moins de 5 minutes ?', 'video_path' => "path",'users_id' => 5, 'domains_id' => 4],
            ['content' => 'Comment se débarrasser des mauvaises herbes rapidement ?', 'video_path' => "path",'users_id' => 2, 'domains_id' => 5],
            ['content' => 'Qui est le joueur de football le plus cher ?', 'video_path' => "path",'users_id' => 3, 'domains_id' => 6],
            ['content' => 'Quelle est la langue la plus compliquée à apprendre ?', 'video_path' => "path",'users_id' => 4, 'domains_id' => 7],
            ['content' => 'Quelles sont les précautions à prendre avant de casser un mur ?', 'video_path' => "path",'users_id' => 5, 'domains_id' => 8],
            ['content' => 'On dit pain au chocolat ou chocolatine ?', 'video_path' => "path",'users_id' => 2, 'domains_id' => 9],
            ['content' => 'Comment surmonter ses phobies ?', 'video_path' => "path",'users_id' => 3, 'domains_id' => 10],
            ['content' => 'Quelle est la meilleure carte graphique repport qualité prix ?', 'video_path' => "path",'users_id' => 4, 'domains_id' => 11],
            ['content' => 'Exemple template question type Art ?', 'video_path' => "path",'users_id' => 5, 'domains_id' => 12],
            ['content' => 'Pourquoi les romains ont disparu ?', 'video_path' => "path",'users_id' => 2, 'domains_id' => 13],

        ];

        //DB::table('questions')->insert($questions);

        $answers = [
            ['ans_content' => 'Il parait', 'video_path' => "path",'users_id' => 4, 'questions_id' => 1, 'answer_id' => null],
            ['ans_content' => 'Je ne crois pas', 'video_path' => "path",'users_id' => 3, 'questions_id' => 2, 'answer_id' => null],
            ['ans_content' => 'Si si renseigne toi mieux', 'video_path' => "path",'users_id' => 4, 'questions_id' => 2, 'answer_id' => 2],
            ['ans_content' => 'Thermique pour \'autonomie', 'video_path' => "path",'users_id' => 2, 'questions_id' => 3, 'answer_id' => null],
        ];

        //DB::table('answers')->insert($answers);

    }
}
