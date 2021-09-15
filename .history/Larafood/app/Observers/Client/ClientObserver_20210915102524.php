<?php

namespace App\Observers\Client;
use App\Models\Client;

class ClientObserve
{
    /**
     * Handle the Client "created" event.
     *
     * @param  \App\Models\Models\Client  $client
     * @return void
     */
    public function creating(Client $client)
    {
        $client->password = bcrypt($client->password);
    }

    /**
     * Handle the Client "updated" event.
     *
     * @param  \App\Models\Models\Client  $client
     * @return void
     */
    public function updating(Client $client)
    {
        $client->password = bcrypt($client->password);
    }
}