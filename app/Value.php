<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'option_id'
    ];

    /**
     * get option values
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
