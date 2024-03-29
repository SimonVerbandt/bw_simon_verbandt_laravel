<?php

namespace Database\Seeders;

use App\Models\Airline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file=base_path('public/airlines-logos-dataset-master/airlines.json');
        $json = File::get($file);
        $data = json_decode($json);
        foreach($data -> data as $obj){
            $logo = base_path('/public/airlines-logos-dataset-master/images/' . $obj->icao_code . '.png');
            $airline = Airline::create([
                'name' => $obj -> name,
                'iata_code' => $obj -> iata_code,
                'icao_code' => $obj -> icao_code,
                'fleet_size' => $obj -> num_aircraft,
                'logo' => $logo,
            ]);
        }
    }
}
