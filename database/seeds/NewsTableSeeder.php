<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' 		=> 'TikTok to sue Trump administration over ban on app',
            'description' 	=> 'TikTok confirms that it will tap the judicial system to challenge an executive order that bans transactions with the app and its Chinese parent company, ByteDance.',
            'image' 		=> 'No image',
            'status' 		=> 'Active',
        ],
        [
        	'title' 		=> 'What is Lorem Ipsum?',
            'description' 	=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'image' 		=> 'No image',
            'status' 		=> 'Active',
        ]
    );
    }
}
