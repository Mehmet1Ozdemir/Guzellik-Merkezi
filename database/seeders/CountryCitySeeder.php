<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = file_get_contents(public_path('sqlFiles/countries.sql'));
        $cities = file_get_contents(public_path('sqlFiles/cities.sql'));
        $status = DB::unprepared($countries);
        $status = DB::unprepared($cities);
    }
}
