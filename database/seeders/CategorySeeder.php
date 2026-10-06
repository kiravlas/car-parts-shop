<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Body and Interior' => [
                'Body Panels',
                'Interior Accessories',
                'Mirrors and Glass',
                'Switches and Trim',
                'Wipers and Washers',
            ],

            'Brake System' => [
                'Brake Pads and Shoes',
                'Brake Rotors and Drums',
                'Calipers and Components',
                'Hoses and Lines',
                'Master Cylinders and Boosters',
            ],

            'Cooling and Heating' => [
                'Heater Cores and AC Parts',
                'Hoses and Pipes',
                'Intercoolers and Oil Coolers',
                'Radiators and Fans',
                'Water Pumps and Thermostats',
            ],

            'Electrical and Ignition' => [
                'Battery and Power',
                'Ignition Components',
                'Lighting and Bulbs',
                'Sensors and Switches',
                'Starters and Alternators',
            ],

            'Engine and Drivetrain' => [
                'Axles and Driveshafts',
                'Belts and Pulleys',
                'Engine Components',
                'Gaskets and Seals',
                'Transmission and Clutch',
            ],

            'Fuel and Exhaust' => [
                'Catalytic Converters',
                'Exhaust Pipes and Manifolds',
                'Fuel Pumps and Injectors',
                'Fuel Tanks and Filters',
                'Turbo and Superchargers',
            ],

            'Suspension and Steering' => [
                'Bushings and Mounts',
                'Control Arms and Links',
                'Shocks and Struts',
                'Steering Racks and Pumps',
                'Tie Rods and Steering Links',
            ],

            'Wheels and Tyres' => [
                'Summer Wheels',
                'Winter Wheels',
            ],
        ];

        foreach ($categories as $parentName => $children) {
            $parent = Category::create([
                'name' => $parentName,
                'slug' => Str::slug($parentName),
                'parent_id' => null,
            ]);

            foreach ($children as $childName) {
                $parent->children()->create([
                    'name' => $childName,
                    'slug' => Str::slug($childName),
                ]);
            }
        }
    }
}
