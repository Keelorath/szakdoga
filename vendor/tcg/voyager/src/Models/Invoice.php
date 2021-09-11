<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
//use TCG\Voyager\Traits\Translatable;

class Invoice extends Model
{
    //use Translatable;

    //protected $translatable = ['title', 'slug', 'body'];
    protected $table = 'invoices';
    /**
     * Statuses.
     */
    const STATUS_DEL = 'DEL';
    const STATUS_OPEN = 'OPEN';
    const STATUS_CLOSED = 'CLOSED';
    const STATUS_ARCHIVED = 'ARCHIVED';
    const STATUS_STORNO = 'STORNO';

    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_DEL, self::STATUS_OPEN, self::STATUS_CLOSED, self::STATUS_ARCHIVED, self::STATUS_STORNO];

    protected $guarded = [];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->getKey();
        }

        return parent::save();
    }

    /**
     * Scope a query to only include active pages.
     *
     * @param  $query  \Illuminate\Database\Eloquent\Builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDel($query)
    {
        if(Auth::user()->role_id != 1)
        return $query->where('status', static::STATUS_DEL)->where('organization_id', Auth::user()->organization_id);
        else
            return $query->where('status', static::STATUS_DEL);
    }
    public function scopeOpen($query)
    {
        if(Auth::user()->role_id != 1)
        return $query->where('status', static::STATUS_OPEN)->where('organization_id', Auth::user()->organization_id);
        else
            return $query->where('status', static::STATUS_OPEN);
    }
    public function scopeClosed($query)
    {
        if(Auth::user()->role_id != 1)
            return $query->where('status', static::STATUS_CLOSED)->where('organization_id', Auth::user()->organization_id);
        else
            return $query->where('status', static::STATUS_CLOSED);
    }
    public function scopeArchived($query)
    {
        if(Auth::user()->role_id != 1)
        return $query->where('status', static::STATUS_ARCHIVED)->where('organization_id', Auth::user()->organization_id);
        else
            return $query->where('status', static::STATUS_ARCHIVED);
    }
    public function scopeStorno($query)
    {
        if(Auth::user()->role_id != 1)
        return $query->where('status', static::STATUS_STORNO)->where('organization_id', Auth::user()->organization_id);
        else
            return $query->where('status', static::STATUS_STORNO);
    }
}
