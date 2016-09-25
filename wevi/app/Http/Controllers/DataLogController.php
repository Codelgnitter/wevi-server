<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\readDataPoints;
use App\Jobs\ReadMqttTopics;
use App\Http\Requests;

class DataLogController extends Controller
{
    public function collectHttp() {

        $this->dispatch(new readDataPoints());
        return "started data collection via HTTP GET";
    }

    public function collectMqtt() {

        $this->dispatch(new ReadMqttTopics());
        return "started data collection via MQTT";
    }
}
