<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Discount extends Model
{
    public function scopeOrganization($query)
    {
        if(Auth::user()->role_id != 1) // not admin users
            return $query->where('organization_id', Auth::user()->organization_id);
    }
}
