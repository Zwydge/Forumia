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
        $domains = [
            ['label' => 'Film'],
            ['label' => 'Astronomie'],
            ['label' => 'Automobile'],
            ['label' => 'Développement'],
            ['label' => 'Cuisine'],
            ['label' => 'Science'],
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
            ['content' => 'Gneu gneu le soleil, ah bon ?', 'video_path' => "path",'users_id' => 4, 'questions_id' => 1],
            ['content' => 'parce que cest bien', 'video_path' => "path",'users_id' => 3, 'questions_id' => 2],
            ['content' => 'renseigne toi sur les bases', 'video_path' => "path",'users_id' => 2, 'questions_id' => 3],
        ];

        DB::table('answers')->insert($answers);

        //$tickets = [
        //    ['type' => 'Problème sur une réponse ou réponse manquante', 'email' => 'paul.chombart@gmail.com', 'content'=> 'il manque la réponse LOTR pour la musique du seigneur des anneaux'],
        //    ['type' => 'Problème sur une musique/un son', 'email' => 'anthony.moutonnet@gmail.com', 'content'=> 'le cri de lelephant est dans le type son, il devrait etre dans animaux' ],
        //    ['type' => 'Problème sur une réponse ou réponse manquante', 'email' => 'kevin.nochelsky@gmail.com', 'content'=> 'la réponse SOY marche pour shape of you, cest un peu abusé je trouve'],
        //];

        //DB::table('ticket')->insert($tickets);

       // $reports = [
        //    ['type' => 'Pseudo offenssant/innaproprié', 'content' => 'il aime pas jujutsu', 'for_user'=> 2, 'made_by' => 4],
        //    ['type' => 'Comportement toxique', 'content' => 'il a pété (toxique le jeu de mot tmtc)', 'for_user'=> 2, 'made_by' => 3],
        //];

        //DB::table('report')->insert($reports);

        //$news = [
        //    ['content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit lorem scelerisque, lobortis magna non, dictum nunc. Aliquam eleifend lacinia nunc eu blandit. Praesent fermentum urna eu ex dapibus, sed fermentum turpis vestibulum. Curabitur congue sem dapibus, vehicula ex eleifend, placerat erat. Mauris efficitur risus quis nulla mattis elementum. Maecenas vehicula libero eget purus maximus, ut condimentum mi egestas. Etiam at odio at purus pretium venenatis ac id lorem.Fusce sed eleifend purus. Phasellus magna dolor, efficitur at sem fermentum, sagittis posuere tortor. Suspendisse quis dui ex. Duis fringilla ex neque, vitae fermentum lacus mollis at. Aliquam vel lobortis nisl. Suspendisse potenti. Pellentesque quis dapibus arcu, sit amet maximus metus. Nunc vulputate, purus vitae condimentum tincidunt, sapien justo volutpat diam, vitae egestas justo mi et eros. Ut finibus neque et finibus pharetra. Quisque condimentum orci lorem, vulputate luctus nunc feugiat vel. Nam consequat augue augue, id vulputate est bibendum eget. Sed eget odio lacus.']
        //];

        //DB::table('news')->insert($news);
    }
}
