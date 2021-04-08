<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;

class Tax extends Model
{
    use Translatable;
    protected $translatable= ['tax','organization_id'];
    public function scopeOrganization($query)
    {
        if(Auth::user()->role_id != 1) // not admin users
            return $query->where('organization_id', Auth::user()->organization_id);
    }
}
