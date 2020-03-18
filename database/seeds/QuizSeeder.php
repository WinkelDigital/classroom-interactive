<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                
        DB::table('quizzes')->insert([
            'id'=>1,
            'name' => 'World Cup Quiz',
            'description' => 'test',
            'owner_id'=>2
        ]);
        DB::table('activities')->insert([
            'id'=>1,
            'type' => 'quiz',
            'rel_id'=>1,
            'classroom_id'=>1,
            'duration'=>60,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('quiz_attempts')->insert([
            'id'=>1,
            'activity_id' => 1,
            'user_id'=>3,
            'start'=> Carbon::now(),
            'finish'=> Carbon::now()->addHour()
        ]);
        
        
    }
}
