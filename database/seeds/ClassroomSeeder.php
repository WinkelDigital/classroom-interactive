<?php

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('classrooms')->insert([
            'id'=>1,
            'code' => '29387',
            'name' => 'Room 1A',
            'description' => 'test',
            'owner_id' => 2
        ]);
        DB::table('classroom_members')->insert(['classroom_id'=>1,'user_id'=>2]);
        DB::table('classroom_members')->insert(['classroom_id'=>1,'user_id'=>3]);
    }
}
