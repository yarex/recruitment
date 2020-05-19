<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Lottery;
use \DateTime;

class LotteryController extends Controller
{
    /*
        App\Lottery:
        public function lottery_tickets()
        {
            return $this->hasMany('App\LotteryTicket');
        }

        web.php
        Route::get('/lottery-slug/{date}', 'LotteryController@index');
    */

    /**
     * Closure
     * date: format 'Y-m-d'
     */
    public function filterTickets(?string $date) : callable
    {
        if (empty($date)) {
            $date = (new DateTime('1 month ago'))->format('Y-m-d');
        }

        $callback = function() use ($date) {
            return \App\Lottery::firstWhere('slug', '=', 'lottery-slug')
                ->lottery_tickets()
                ->where('created_at', '>=', $date)
                ->get();
        };

        return $callback;
    }

    /**
     * 
     */
    public function index(Request $req) : string
    {
        $date = $req->date;
       
        $tickets = $this->filterTickets($date)();

        return response()->json($tickets);
    }

}
