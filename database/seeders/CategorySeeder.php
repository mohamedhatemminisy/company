<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no_of_rows = 5;
        for( $i=0; $i < $no_of_rows; $i++ ){
            $category = array(
                'name' => Str::random(10),
            );
            Category::insert( $category );
            $category=null;
        }
    }
}
