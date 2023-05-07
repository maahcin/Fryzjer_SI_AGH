<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $userID = Auth::id();
        $mySpeciality = DB::select(DB::raw("select speciality from users where id=$userID and type=2"));
        $mySpecialities = explode(", ", $mySpeciality[0]->speciality);
        $str = "";
        foreach ($mySpecialities as $m) {
            $str = $str."'".$m."',";
        }
        $str = substr($str, 0, strlen($str)-1);
        $services = DB::select(DB::raw("select name, est_time_min, cost from services where name in ($str)"));
        return view('services.index')->with('services', $services);
    }
}
