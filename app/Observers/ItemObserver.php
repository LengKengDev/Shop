<?php

namespace App\Observers;

use App\Item;

class ItemObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function created(Item $item)
    {

    }
}
