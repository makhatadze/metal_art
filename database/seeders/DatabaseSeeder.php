<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'webmaster webmaster',
            'email' => 'webmaster@gmail.com',
            'password' =>'$2y$10$sgEPreNxcHq0gtVFEXFSFOYMES5nXqyWcjnOiqAYMO3CB4kxtbkKi'
        ]);

        DB::table('pages')->insert([
            'slug' => 'home',
            'title_ge' => 'home',
            'title_en' => 'home',
            'meta_title_ge' => 'meta title ge',
            'meta_title_en' => 'meta title en',
            'description_ge' => 'Description ge',
            'description_en' => 'Description en',
            'content_ge' => 'content ge',
            'content_en' => 'content en',
            'status' => true,
        ]);

        DB::table('pages')->insert([
            'slug' => 'catalog',
            'title_ge' => 'catalog',
            'title_en' => 'catalog',
            'meta_title_ge' => 'meta title ge',
            'meta_title_en' => 'meta title en',
            'description_ge' => 'Description ge',
            'description_en' => 'Description en',
            'content_ge' => 'content ge',
            'content_en' => 'content en',
            'status' => true,
        ]);

        DB::table('pages')->insert([
            'slug' => 'details',
            'title_ge' => 'details',
            'title_en' => 'details ',
            'meta_title_ge' => 'meta title ge',
            'meta_title_en' => 'meta title en',
            'description_ge' => 'Description ge',
            'description_en' => 'Description en',
            'content_ge' => 'content ge',
            'content_en' => 'content en',
            'status' => true,
        ]);

        DB::table('pages')->insert([
            'slug' => 'about-us',
            'title_ge' => 'ჩვენს შესახებ',
            'title_en' => 'ჩვენს შესახებ',
            'meta_title_ge' => 'meta title ge',
            'meta_title_en' => 'meta title en',
            'description_ge' => 'Description ge',
            'description_en' => 'Description en',
            'content_ge' => 'content ge',
            'content_en' => 'content en',
            'status' => true,
        ]);

        DB::table('pages')->insert([
            'slug' => 'contact-us',
            'title_ge' => 'contact',
            'title_en' => 'contact',
            'meta_title_ge' => 'meta title ge',
            'meta_title_en' => 'meta title en',
            'description_ge' => 'Description ge',
            'description_en' => 'Description en',
            'content_ge' => 'content ge',
            'content_en' => 'content en',
            'status' => true,
        ]);
        DB::table('settings')->insert([
            'key' => 'site_url',
            'value' => 'https://127.0.0.1'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_title_ge',
            'value' => 'საიტის სახელი'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_title_en',
            'value' => 'site name'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_meta_title_ge',
            'value' => 'site meta title georgia'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_meta_title_en',
            'value' => 'site meta title english'
        ]);
        DB::table('settings')->insert([
            'key' => 'admin_email',
            'value' => 'admin@gmail.com'
        ]);
        DB::table('settings')->insert([
            'key' => 'contact_email',
            'value' => 'contact@gmail.com'
        ]);
        DB::table('settings')->insert([
            'key' => 'support_email',
            'value' => 'support@gmail.com'
        ]);
        DB::table('settings')->insert([
            'key' => 'address_ge',
            'value' => 'მისამართი ქართულად'
        ]);
        DB::table('settings')->insert([
            'key' => 'address_en',
            'value' => 'address english'
        ]);
        DB::table('settings')->insert([
            'key' => 'facebook_url',
            'value' => 'facebook url'
        ]);

        DB::table('settings')->insert([
            'key' => 'instagram_url',
            'value' => 'Instagram url'
        ]);

        DB::table('settings')->insert([
            'key' => 'youtube_url',
            'value' => 'Youtube url'
        ]);

        DB::table('settings')->insert([
            'key' => 'linkedin',
            'value' => 'Linkedin url'
        ]);

        DB::table('settings')->insert([
            'key' => 'phone',
            'value' => '+995599123123'
        ]);

        DB::table('settings')->insert([
            'key' => 'smtp_host',
            'value' => 'host'
        ]);

        DB::table('settings')->insert([
            'key' => 'smtp_port',
            'value' => 'port'
        ]);

        DB::table('settings')->insert([
            'key' => 'smtp_encrypted',
            'value' => 'tls'
        ]);

        DB::table('settings')->insert([
            'key' => 'smtp_email',
            'value' => 'email'
        ]);

        DB::table('settings')->insert([
            'key' => 'smtp_password',
            'value' => 'password'
        ]);

        DB::table('settings')->insert([
            'key' => 'smtp_subject',
            'value' => 'subject'
        ]);

        DB::table('settings')->insert([
            'key' => 'smtp_contact_subject',
            'value' => 'contact subject'
        ]);
    }
}
