<?php

use Illuminate\Database\Seeder;
use Faker\Provider\en_US\Text;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<5;$i++){
             DB::table('topics')->insert([
            'name'=>$faker->realText(10),
                'summary'=>$faker->realText($maxNbChars = 100, $indexSize = 2),
                'content'=>$faker->realText($maxNbChars = 900, $indexSize = 2),
                 'owner_id'=>2
        ]);       
        }

    }
}
