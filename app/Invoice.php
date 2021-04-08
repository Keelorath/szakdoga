<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Invoice extends Model
{
    protected $fillable = [
        'quantity', 'total',
    ];
    protected $hidden = [
        'discount_id', 'organizaton_id', 'user_id', 'partner_id', 'connection_id'
    ];
    public function organization()
    {
        return $this->BelongsTo(Organization::class);
    }
}
