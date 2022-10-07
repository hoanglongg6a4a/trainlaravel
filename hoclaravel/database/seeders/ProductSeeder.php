<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('Product')->insert([
        //     'TenSP' => Str::random(10),
        //     'Gia' => Str::random(10),
        //     'Mota' => Str::random(10),
            
        // ]);
        Product::factory()
        ->count(50)
        ->hasPosts(1)
        ->create();
    }
}
