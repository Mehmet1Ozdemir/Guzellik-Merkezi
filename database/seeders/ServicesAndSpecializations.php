<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesAndSpecializations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Dental Cleaning',
            'type' =>0,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Dental Filling',
            'type' =>0,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Root Canal Treatment',
            'type' =>0,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Dental Implant',
            'type' =>0,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Composite Bonding',
            'type' =>0,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Dental Sealants',
            'type' =>0,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Surgical Extractions',
            'type' =>0,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Dental Assistant',
            'type' =>1,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Dental Hygienist',
            'type' =>1,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Dental Therapist',
            'type' =>1,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Cosmetic Dentistry',
            'type' =>1,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Geriatric Dentistry',
            'type' =>1,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Orthodontics',
            'type' =>1,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Prosthodontics',
            'type' =>1,
        ]);

        \App\Models\ServicesAndSpecializations::create([

            'name' =>'Endodontics',
            'type' =>1,
        ]);
    }
}
