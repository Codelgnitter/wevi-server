<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class chartController extends Controller
{
    //
    public function chart()
    {
          return view("chartView");
    }
}
