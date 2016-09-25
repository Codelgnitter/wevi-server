<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\datapoint;
use App\Http\Requests;

class chartController extends Controller
{
    //
    public function chart()
    {
      $hausanschluss_WL = datapoint::where([
      ['station', '=', 'energie'],
      ['key', '=', 'hausanschluss_wirkleistung_gesamt']])->select('value')->orderBy('created_at', 'desc')->take(20)->get();

      $photovoltaik_WL = datapoint::where([
      ['station', '=', 'energie'],
      ['key', '=', 'photovoltaik_wirkleistung_gesamt']])->select('value')->orderBy('created_at', 'desc')->take(20)->get();


      $aussenfuehler_s = datapoint::where([
      ['station', '=', 'heizung'],
      ['key', '=', 'aussenfuehler_sueden_temperatur']])->select('value')->orderBy('created_at', 'desc')->take(250)->get();


          return view("chartView",compact(["hausanschluss_WL","photovoltaik_WL","aussenfuehler_s"]));
    }
}
