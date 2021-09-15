<?php

namespace App\Observers\Client;

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
        $client->url = Str::kebab($client->name);
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
