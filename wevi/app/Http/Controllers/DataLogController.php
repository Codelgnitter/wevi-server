<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\readDataPoints;
use App\Http\Requests;

class DataLogController extends Controller
{
    public function collect() {

        $this->dispatch(new readDataPoints());
        return 0;
    }
}
