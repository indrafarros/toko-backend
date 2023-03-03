<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Nike', 'Adidas', 'Compas', 'Vans', 'Puma', 'Converse', 'New Balance'];
        foreach ($data as $item) {
            Brand::create(['name' => $item]);
        };
    }
}
