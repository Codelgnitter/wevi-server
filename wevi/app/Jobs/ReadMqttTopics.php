<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use \Mosquitto\Client as MosquittoClient;

class ReadMqttTopics implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $client;
    protected $topics = array(
        'io/cybus/energie-campus/hausanschluss/wirkleistung/gesamt',
        'io/cybus/energie-campus/photovoltaik/wirkleistung/gesamt',
        'io/cybus/energie-campus/energie/hausanschluss/wirkleistung/gesamt',
        'io/cybus/energie-campus/energie/kaelte/wirkleistung/gesamt',
        'io/cybus/energie-campus/energie/elektrolyse/wirkleistung/gesamt',
        'io/cybus/energie-campus/energie/bhkw/wirkleistung/gesamt',
        'io/cybus/energie-campus/energie/waermepumpe/wirkleistung/gesamt',
        'io/cybus/energie-campus/energie/methanisierung/wirkleistung/gesamt',
        'io/cybus/energie-campus/energie/photovoltaik/wirkleistung/gesamt',
        'io/cybus/energie-campus/heizung/aussenfuehler/norden/temperatur',
        'io/cybus/energie-campus/heizung/aussenfuehler/sueden/temperatur',
        'io/cybus/energie-campus/kaelte/speicher/unten/temperatur',
        'io/cybus/energie-campus/kaelte/speicher/mitte/temperatur',
        'io/cybus/energie-campus/kaelte/speicher/oben/temperatur',
        'io/cybus/energie-campus/bhkw/oel',
        'io/cybus/energie-campus/raumluft/gas/elektrolyse/co2',
        'io/cybus/energie-campus/elektroauto/ladestation/ladezeit',
        'io/cybus/energie-campus/elektroauto/ladestation/ladezeit',
        'io/cybus/energie-campus/speicher/4/anforderung'
    );

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /* subscripe to the mqtt topics */
        $client = new MosquittoClient('CodelgnitterID'.rand());
        $client->setCredentials('codeignitter', 'zj8YWq3CZa');
        $client->onConnect(function($code, $message) use ($client) {
            foreach ($this->topics as $topic) {
                $client->subscribe($topic, 0);
            }
        });

        $client->onMessage(function($message) {
            print($message->topic."\n".$message->payload."\n\n");
        });

        $client->connect('energie-campus.cybus.io', 1883);
        $client->loopForever();
    }

}
