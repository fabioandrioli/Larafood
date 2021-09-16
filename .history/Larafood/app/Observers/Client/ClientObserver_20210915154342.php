<?php

namespace App\Observers\Client;
use App\Models\Client;
use Illuminate\Support\Str;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     *
     * @param  \App\Models\Models\Client  $client
     * @return void
     */
    public function creating(Client $client)
    {
        $category->uuid = Str::uuid();
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