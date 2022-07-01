<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
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
            $city = array(
                'name' => Str::random(10),
            );
            City::insert( $city );
            $city=null;
        }
    }
}
