<?php

namespace App\Http\Controllers;
use App\Models\SessionDetails;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{
    public function SessionDetails(){
        $ip = $_SERVER['REMOTE_ADDR'];               
        $country =  Http::get('http://ip-api.com/json/'.$ip)['country'];
        $countryCode =  Http::get('http://ip-api.com/json/'.$ip)['countryCode'];
        $regionName =  Http::get('http://ip-api.com/json/'.$pd)['regionName'];
        $city =  Http::get('http://ip-api.com/json/'.$ip)['city'];
        $timezone =  Http::get('http://ip-api.com/json/'.$ip)['timezone'];
    
        $response = SessionDetails::insert([
            'ip' => $ip,
            'country' => $country,
            'countryCode' => $countryCode,
            'regionName' => $regionName,
            'city' => $city,
            'timezone' => $timezone,
            'created_at' => Carbon::now()
        ]);
    }
    
}
