<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AreaSeeder extends Seeder
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
            $area = array(
                'name'    => Str::random(10),
                'city_id' =>  City::all()->random()->id
            );
            Area::insert( $area );
            $area=null;
        }
    }
}
