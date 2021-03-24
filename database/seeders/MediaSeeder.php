<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Media::create([
//            'slug' => '12345',
//            'path' => 'dev/386387.jpg',
//            'type' => 'i',
//            'filename_original' => 'santa_pirates.jpeg',
//            'user_id' => 1,
//        ]);

        Media::factory(50)->create();
    }
}
