<?php

use Illuminate\Database\Seeder;
use App\Airport;
use App\Flight;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fetch all airports
        $airports = Airport::all();
        
        //for each airport insert airports code as code_dep and code_arr in flights table
        foreach ($airports as $airportDep) {
            foreach ($airports as $airportArr) {
                if ($airportDep->code !== $airportArr->code) {
                   
                    DB::table('flights')->insert([
                         'code_departure' => $airportDep->code,
                         'code_arrival' => $airportArr->code,
                         'price' => rand(2000, 100000)
                 ]);
                }
            }
        }
    }
}
