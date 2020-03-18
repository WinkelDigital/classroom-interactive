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
         $this->call(UserSeeder::class);
         $this->call(ClassroomSeeder::class);
         $this->call(QuizSeeder::class);
         $this->call(QuestionSeeder::class);
         $this->call(TopicSeeder::class);
    }
}
