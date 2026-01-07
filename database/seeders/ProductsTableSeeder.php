<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'رز مصيافي 1كغ', 'category' => 'food', 'price_usd' => 2.5],
            ['name' => 'سكر أبيض 1كغ', 'category' => 'food', 'price_usd' => 1.8],
            ['name' => 'زيت دوار الشمس 1لتر', 'category' => 'food', 'price_usd' => 4.2],
            ['name' => 'مسحوق غسيل تايد 2كغ', 'category' => 'cleaning', 'price_usd' => 3.0],
            ['name' => 'صابون ديتول', 'category' => 'cleaning', 'price_usd' => 0.7],
            ['name' => 'منظف زجاج', 'category' => 'cleaning', 'price_usd' => 1.2],
        ]);
    }
}
