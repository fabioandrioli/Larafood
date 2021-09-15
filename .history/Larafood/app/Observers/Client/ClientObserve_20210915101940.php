<?php

namespace App\Observers\Client;
use App\Models\Client;

class ClientObserve
{
    /**
     * Handle the Plan "created" event.
     *
     * @param  \App\Models\Models\Plan  $client
     * @return void
     */
    public function creating(Plan $client)
    {
        $client->password = bcrypt($client->password);
    }

    /**
     * Handle the Plan "updated" event.
     *
     * @param  \App\Models\Models\Plan  $client
     * @return void
     */
    public function updating(Plan $client)
    {
        $client->url = Str::kebab($client->name);
    }
}