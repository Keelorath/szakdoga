<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;

class Organization extends Model
{
    use Translatable;
    protected $translatable = ['title', 'body'];
    protected $fillable = [
        'name', 'country', 'zip_code', 'city', 'address', 'phone_number','email_address', 'tax_number'
    ];

    public function scopeOrganization($query)
    {

        if(Auth::user()->role_id != 1) // not admin users
            return $query->where('user_id', Auth::user()->organization_id);

    }
}
