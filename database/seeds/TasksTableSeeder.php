<?php

use Illuminate\Database\Seeder;
use App\Tasks;
use Faker\Factory;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0; $i < 5; $i++) {
            $task = new Tasks();
            $task->title = $faker->sentence;
            $task->content = $faker->text(200);
            $task->users_id = ($i+1);
            $task->save();
        }
    }
}
