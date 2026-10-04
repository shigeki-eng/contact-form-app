<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Tag;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ja_JP');

        for ($i = 0; $i < 20; $i++){

            $category = Category::inRandomOrder()->first();

            $param = [
                'category_id' => $category->id,
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'gender' => $faker->numberBetween(1, 3),
                'email' => $faker->safeEmail(),
                'tel' => $faker->numerify('0##########'),
                'address' => $faker->address(),
                'building' => $faker->secondaryAddress(),
                'detail' => $faker->text(120),
            ];

            $contact = Contact::create($param);

            $tagIds = Tag::inRandomOrder()
                ->limit($faker->numberBetween(1, 3))
                ->pluck('id')
                ->toArray();

            $contact->tags()->attach($tagIds);
        }
    }
}
