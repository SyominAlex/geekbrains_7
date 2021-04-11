<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }
	protected function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 10; $i++) {
			$title = $faker->sentence(mt_rand(3,10));
			$slug = Str::slug($title);
			$data[] = [
				'category_id' => 1,
				'title' => $title,
				'slug' => $slug,
				'text' => $faker->text(mt_rand(100, 300))
			];
		}

		return $data;
	}
}
