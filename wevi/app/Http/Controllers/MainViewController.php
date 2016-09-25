<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\datapoint;
use App\Http\Requests;



class MainViewController extends Controller
{
    public function makeView($station) {

       $data = datapoint::where("station",$station)->orderBy('created_at', 'desc')->first();

       return view('mainView', compact("data"));

    }


    public function current() {

    $bhkw_wirkleistung_tmp = datapoint::where([
    ['station', '=', 'bhkw'],
    ['key', '=', 'wirkleistung']])->orderBy('created_at', 'desc')->first();
    $bhkw_WL = $bhkw_wirkleistung_tmp->value;

    $photovoltaik_wirkleistung_tmp = datapoint::where([
    ['station', '=', 'photovoltaik'],
    ['key', '=', 'wirkleistung']])->orderBy('created_at', 'desc')->first();
    $photovoltaik_WL = $photovoltaik_wirkleistung_tmp->value;

    $hausanschluss_wirkleistung_tmp = datapoint::where([
    ['station', '=', 'hausanschluss'],
    ['key', '=', 'wirkleistung']])->orderBy('created_at', 'desc')->first();
    $hausanschluss_WL = $hausanschluss_wirkleistung_tmp->value;

    $kaelte_wirkleistung_tmp = datapoint::where([
    ['station', '=', 'kaelte'],
    ['key', '=', 'wirkleistung']])->orderBy('created_at', 'desc')->first();
    $kaelte_WL = $kaelte_wirkleistung_tmp->value;

    $elektrolyse_wirkleistung_tmp = datapoint::where([
    ['station', '=', 'elektrolyse'],
    ['key', '=', 'wirkleistung']])->orderBy('created_at', 'desc')->first();
    $elektrolyse_WL = $elektrolyse_wirkleistung_tmp->value;

    $waermepumpe_wirkleistung_tmp = datapoint::where([
    ['station', '=', 'waermepumpe'],
    ['key', '=', 'wirkleistung']])->orderBy('created_at', 'desc')->first();
    $waermepumpe_WL = $waermepumpe_wirkleistung_tmp->value;

    $methanisierung_wirkleistung_tmp = datapoint::where([
    ['station', '=', 'methanisierung'],
    ['key', '=', 'wirkleistung']])->orderBy('created_at', 'desc')->first();
    $methanisierung_WL = $methanisierung_wirkleistung_tmp->value;

    $bhkw_oel_tmp = datapoint::where([
    ['station', '=', 'bhkw'],
    ['key', '=', 'oel']])->orderBy('created_at', 'desc')->first();
    $bhkw_oel = $bhkw_oel_tmp->value;

    $raumluft_co2_tmp = datapoint::where([
    ['station', '=', 'raumluft'],
    ['key', '=', 'co2']])->orderBy('created_at', 'desc')->first();
    $raumluft_co2 = $raumluft_co2_tmp->value;





    return view('mainView',
    compact(["bhkw_WL", "photovoltaik_WL","hausanschluss_WL", "kaelte_WL", "elektrolyse_WL",
    "waermepumpe_WL", "methanisierung_WL", "bhkw_oel", "raumluft_co2"]));


    }




}
