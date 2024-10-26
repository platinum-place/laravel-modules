<?php

namespace Modules\Auth\app\Observers;

use Illuminate\Support\Str;
use Modules\Auth\app\Models\Client;

class ClientObserver
{
    public function creating(Client $client): void
    {
        $client->secret = Str::random(40);
        $client->personal_access_client = false;
        $client->password_client = false;
        $client->revoked = false;
        $client->redirect = '';
    }

    /**
     * Handle the Client "created" event.
     */
    public function created(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "updated" event.
     */
    public function updated(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "deleted" event.
     */
    public function deleted(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "restored" event.
     */
    public function restored(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     */
    public function forceDeleted(Client $client): void
    {
        //
    }
}
