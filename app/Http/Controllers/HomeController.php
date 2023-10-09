<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    protected $model;
    public function __construct(Attendee $model)
    {
        $this->model = $model;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $participants = DB::table('attendees')->count();
        $day1 = DB::table('attendees')->where('Day_1', '=', 'Attended')->count();
        $day2 = DB::table('attendees')->where('Day_2', '=', 'Attended')->count();
        $day3 = DB::table('attendees')->where('Day_3', '=', 'Attended')->count();
        $DDO = DB::table('attendees')->where('Chapter', '=', 'Davao de Oro')->count();
        $DDN = DB::table('attendees')->where('Chapter', '=', 'Davao del Norte')->count();
        $DDSO = DB::table('attendees')->where('Chapter', '=', 'Davao del Sur/Occidental')->count();
        $Davao = DB::table('attendees')->where('Chapter', '=', 'Davao City')->count();
        $DO = DB::table('attendees')->where('Chapter', '=', 'Davao Oriental')->count();
        // dd($participants);
        return inertia('Home', [
            'participants' => $participants,
            'day1' => $day1,
            'day2' => $day2,
            'day3' => $day3,
            'DDO' => $DDO,
            'DDOPercent' => round((($DDO / $participants) * 100), 2),
            'DDN' => $DDN,
            'DDNPercent' => round((($DDN / $participants) * 100), 2),
            'DDSO' => $DDSO,
            'DDSOPercent' => round((($DDSO / $participants) * 100), 2),
            'Davao' => $Davao,
            'DavaoPercent' => round((($Davao / $participants) * 100), 2),
            'DO' => $DO,
            'DOPercent' => round((($DO / $participants) * 100), 2),
        ]);
        // return view('home');
    }
}
