<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Flight;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getSearchPage() {
        $airports = Airport::all();
        $flights = Flight::all();
        // dd($airports);
        return view('search-flight', compact('airports', 'flights'));
    }

    public function getPrice(Request $request) {
        
        $data = $request->all();
        
        $validateRequest = $request->validate([
            'departure' => 'required|different:arrival',
            'arrival' => 'required|different:departure',
        ]);
        
                
        //direct flight
        
        $departure = Airport::where('code', '=', $validateRequest['departure'])->value('name');
        $arrival = Airport::where('code', '=', $validateRequest['arrival'])->value('name');
        $price = Flight::where('code_departure', '=', $validateRequest['departure'])->where('code_arrival', '=', $validateRequest['arrival'])->value('price');
        
        //direct flight ticket
        $ticket = ['departure'=>$departure, 'arrival'=>$arrival, 'stopover' => '', 'price'=>$price, 'code_departure' => $validateRequest['departure'],'code_arrival' => $validateRequest['arrival']];
        

        //cheap ticket with stopover
        $airports = Airport::whereNotIn('code', [$validateRequest['departure'], $validateRequest['arrival']])
                ->get();

                        
        foreach ($airports as $airport) {
            $first = Flight::where([
                ['code_departure', $validateRequest['departure']],
                ['code_arrival', $airport -> code]
                    ])->value('price');
            $second =  Flight::where([
                ['code_departure', $airport -> code],
                ['code_arrival', $validateRequest['arrival']]
                    ])->value('price');
                    $price = $first + $second;
                    
            if ($price < $ticket['price']) {
                $ticket['stopover'] = $airport -> name;
                $ticket['price'] = $price;
            }
        }

     return view('results', compact('ticket'));

    }
}
