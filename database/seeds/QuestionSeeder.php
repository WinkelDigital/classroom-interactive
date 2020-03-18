<?php

use Illuminate\Database\Seeder;
use Faker\Provider\Lorem;
use Faker\Provider\en_US\Text;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $answer_type = ['boolean','multiple','text'];
        for ($i = 1 ; $i< 21;$i++){
        $ans = $answer_type[rand(0,2)];
        if($ans == 'boolean'){
            $answer = 'true';
        }else if($ans == 'text'){
            $answer = $faker->word;
        }else{
        $answer = null;
        }
        DB::table('questions')->insert([
            'id'=>$i,
            'quiz_id'=>1,
            'content' => $faker->realText($maxNbChars = 150, $indexSize = 2),
            'type' => $ans,
            'answer' => $answer
        ]);
        if($ans == 'multiple'){
            $optans = rand(0,5);
            for($j=0;$j<6;$j++){
            $new =DB::table('question_answer_options')->insert([
                'question_id'=>$i,
                'answer_option'=>$faker->realText($maxNbChars = 50, $indexSize = 2),
                'point'=>($j==$optans?10:0)
            ]);
            }
        }
        DB::table('quiz_attempt_answers')->insert([
            'id'=>$i,
            'squence'=>$i,
            'quiz_attempt_id'=>1,
            'user_id'=>3,
            'question_id'=>$i,
            'answer'=> $answer,
            'point'=>10
        ]);
        }
        
//        $questions = ['quiz_id'=>1,'content','answer'];
    }
}
