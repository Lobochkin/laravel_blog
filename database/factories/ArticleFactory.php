<?php

namespace Database\Factories;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'slug' => Str::slug(mb_substr($this->faker->title,0,40).'-'.Carbon::now()->format('dmyHi'),'-'),
            'description_short' => $this->faker->text,
            'description' => $this->faker->text,
            'image' => $this->faker->image,
            'image_show' => $this->faker->boolean,
            'meta_title' => $this->faker->title,
            'meta_description' => $this->faker->title,
            'meta_keyword' => $this->faker->title,
            'published' => $this->faker->boolean,

            'viewed' => '1',
        ];
    }
}
