<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => Str::random(6) . '.jpg',
            'path' => $this->path(),
            'type' => 'i',
            'filename_original' => $this->faker->word . '.jpg',
            'user_id' => User::factory()->create(),
        ];
    }

    private function path()
    {
        return 'dev/' .  Arr::random([
            '386387.jpg',
            'pikahcu.jpg',
            'image.jpeg',
            'halfelf.jpg'
        ]);
    }
}
