<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ShopFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['user_id' => "\Illuminate\Support\HigherOrderCollectionProxy|mixed", 'name' => "string", 'subdomain' => "string", 'hash' => "string", 'status' => "string"])] public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'name' => fake()->name,
            'subdomain' => fake()->domainName,
            'hash' => fake()->unique()->sha1,
            'status' => Shop::STATUS_ACTIVE,
        ];
    }
}
