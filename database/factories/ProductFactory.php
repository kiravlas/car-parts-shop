<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $brand = fake()->randomElement([
            'Bosch',
            'Brembo',
            'Denso',
            'NGK',
            'Valeo',
            'Monroe',
            'Gates',
            'SKF',
            'Sachs',
            'Bilstein',
            'Mahle',
            'ATE',
            'Febi',
            'Mann-Filter',
            'Continental',
        ]);

        $part = fake()->randomElement([
            'Brake Pad Set',
            'Brake Rotor',
            'Brake Caliper',
            'Radiator',
            'Water Pump',
            'Alternator',
            'Starter Motor',
            'Shock Absorber',
            'Control Arm',
            'Wheel Bearing',
            'Oil Filter',
            'Air Filter',
            'Fuel Pump',
            'Spark Plug Set',
            'Clutch Kit',
            'Turbocharger',
            'Exhaust Manifold',
            'Battery',
            'Steering Rack',
            'Serpentine Belt',
        ]);

        $name = "{$brand} {$part} ".fake()->unique()->bothify('??-####');

        return [
            'category_id' => null,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(2, true),
            'price' => fake()->randomFloat(2, 20, 600),
            'sale_price' => null,
            'stock' => fake()->numberBetween(5, 100),
            'is_new_arrival' => false,
            'total_sales' => fake()->numberBetween(0, 99),
        ];
    }

    public function onSale(): static
    {
        return $this->state(function (array $attributes): array {
            $price = $attributes['price'];

            return [
                'sale_price' => round(
                    $price * fake()->randomFloat(2, 0.60, 0.90),
                    2
                ),
            ];
        });
    }

    public function topSeller(): static
    {
        return $this->state([
            'total_sales' => fake()->numberBetween(100, 1500),
        ]);
    }

    public function newArrival(): static
    {
        return $this->state([
            'is_new_arrival' => true,
        ]);
    }
}
