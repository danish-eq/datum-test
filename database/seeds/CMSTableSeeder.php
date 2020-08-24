<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CMSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms_models')->insert([
            'title' 		=> 'About Us',
            'description' 	=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'status' 		=> 'Active',
        ],
        [
        	'title' 		=> 'Terms & Conditions',
            'description' 	=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'status' 		=> 'Active'
        ]
    );
    }
}