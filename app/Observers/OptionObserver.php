<?php

namespace App\Observers;

use App\Option;

class OptionObserver
{
    /**
     * Listen to the Option created event.
     *
     * @param Option $option
     * @return void
     */
    public function deleting(Option $option)
    {
        $option->values()->delete();
    }
}
