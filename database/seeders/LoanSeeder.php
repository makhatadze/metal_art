<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'slug' => 'statement',
            'title_ge' => 'განაცხადი',
            'title_en' => 'statement',
            'meta_title_ge' => 'meta title ge',
            'meta_title_en' => 'meta title en',
            'description_ge' => 'Description ge',
            'description_en' => 'Description en',
            'content_ge' => 'content ge',
            'content_en' => 'content en',
            'status' => true,
        ]);
    }
}
