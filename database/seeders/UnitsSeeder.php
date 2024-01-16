<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitsArr = [
            ['Eye'],
            ['Beauty'],
            ['Aesthetic'],

        ];

        for($i=0; $i<count($unitsArr);$i++){
          Unit::create([
              'name'=>$unitsArr[$i][0]
          ]);
        }
    }
}
