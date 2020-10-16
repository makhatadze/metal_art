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
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

        foreach (range(1,200) as $index) {
            DB::table('students')->insert([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'username' => $faker->username,
                'phone' => $faker->phoneNumber,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }

        DB::table('pages')->insert([
            'slug' => 'about-us',
            'title_ge' => 'ჩვენს შესახებ',
            'title_en' => 'ჩვენს შესახებ',
            'meta_title_ge' => 'ჩვენს შესახებ',
            'meta_title_en' => 'ჩვენს შესახებ',
            'content_ge' => 'rame',
            'content_en' => 'rame',
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
    }
}
