<?php

namespace DevWorkout\UserIps\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserIP extends Model
{
    protected $table = 'user_ips';

    protected $guarded = [];

    public function scopeWithMultipleUsers( Builder $q )
    {
        return $q->groupBy( 'ip' )->havingRaw( 'COUNT(*) > 1 ' );
    }

    public function user()
    {
        return $this->belongsTo( config( 'auth.providers.users.model' ) );
    }

    public function users()
    {
        $model = config( 'auth.providers.users.model' );
        return $model::find( $this->user_ids() );
    }

    public function user_ids()
    {
        return static::where( 'ip', $this->ip )->pluck( 'user_id' );
    }

}