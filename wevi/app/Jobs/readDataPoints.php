<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\datapoint;

class readDataPoints implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    // datapoints in (station, key, url)
    private $datapoints = array(
        array('hausanschluss', 'wirkleistung', 'energie/hausanschluss/wirkleistung/gesamt'),
        array('kaelte', 'wirkleistung', 'energie/kaelte/wirkleistung/gesamt'),
        array('elektrolyse', 'wirkleistung', 'energie/elektrolyse/wirkleistung/gesamt'),
        array('bhkw', 'wirkleistung', 'energie/bhkw/wirkleistung/gesamt'),
        array('waermepumpe', 'wirkleistung', 'energie/waermepumpe/wirkleistung/gesamt'),
        array('methanisierung', 'wirkleistung', 'energie/methanisierung/wirkleistung/gesamt'),
        array('photovoltaik', 'wirkleistung', 'energie/photovoltaik/wirkleistung/gesamt'),
        array('aussenfuehler', 'temperatur', 'heizung/aussenfuehler/norden/temperatur'),
        array('aussenfuehler', 'temperatur', 'heizung/aussenfuehler/sueden/temperatur'),
        array('kaelte', 'temperatur', 'kaelte/speicher/unten/temperatur'),
        array('kaelte', 'temperatur', 'kaelte/speicher/mitte/temperatur'),
        array('kaelte', 'temperatur', 'kaelte/speicher/oben/temperatur'),
        array('bhkw', 'oel', 'bhkw/oel'),
        array('raumluft', 'co2', 'raumluft/gas/elektrolyse/co2'),
        array('photovoltaik', 'wirkleistung', 'photovoltaik/wirkleistung'),
        array('elektroauto', 'ladezeit', 'elektroauto/ladestation/ladezeit'),
        array('elektroauto', 'ev-status', 'elektroauto/ladestation/ladezeit'),
        array('speicher4', 'anforderung', 'speicher/4/anforderung')
    );

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = "codeignitter";
        $pass = "zj8YWq3CZa";
        $base_url = "http://energie-campus.cybus.io/resources/io/cybus/energie-campus/";
        $opts = array(
          'http'=>array(
            'method'=>"GET",
            'header' => "Authorization: Basic " . base64_encode("$user:$pass")
          )
        );
        $context = stream_context_create($opts);

        // read all datapoints
        foreach ($this->datapoints as $dp) {
            $station = $dp[0];
            $key = $dp[1];
            $url = $dp[2];

            try {
                // Open the file using the HTTP headers set above
                $json_data = file_get_contents($base_url.$url, false, $context);
                $data = json_decode($json_data, true);

                print_r($station.':'.$key.':'.$data['value'].'\r\n');

                // add database entry
                datapoint::create(['station' => $station,
                                   'key' => $key,
                                   'value' => $data['value'],
                                   'data_timestamp' => $data['timestamp']]);

            } catch (Exception $e) {
                print('error while requesting data: '.$e->getMessage()."\n");
            }
        }
    }
}
