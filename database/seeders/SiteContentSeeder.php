<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContent;
class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // SiteContent::create([
        //     'name'=>'banner',
        //     'contnet'=>json_encode([
               
        //         'title'=>'Lorem ipsum dolor sit amet',
        //         'subtitle'=>'Lorem ipsum dolor sit amet',
        //         'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet auctor justo.',
        //     ]),
        // ]);
        SiteContent::create([
            'name'=>'co_section',
            'contnet'=>json_encode([
                'title'=>'POPULAR COURSES',
                'subtitle'=>'Special Courses',               
            ]),
        ]);
    }
}
