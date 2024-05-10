<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Shoes'],
            ['name' => 'Clothes'],
            ['name' => 'Sports'],
        ];

        DB::table('categories')->insert($categories);
    }
}
