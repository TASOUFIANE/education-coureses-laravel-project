<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 3; $i++) {
           for($j=1; $j<=6; $j++) {
               $course = Course::create([
                   'category_id' => $i,
                   'trainer_id' => $j,
                   'small_description' => 'Course ' . $i,
                   'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet auctor justo.",
                   'price' => rand(100,5000),
                   'img' => 'https://picsum.photos/300/300?random=' . $i,
                   
                  
               ]);
           }
        }
    }
}
