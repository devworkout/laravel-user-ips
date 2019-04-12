<?php

namespace DevWorkout\UserIps;


use DevWorkout\UserIps\Models\UserIP;

trait HasIPs
{
    public function ips()
    {
        return $this->hasMany( UserIP::class );
    }

    public function rememberIP( $ip )
    {
        $validator = \Validator::make( [ 'ip' => $ip ], [ 'ip' => 'required|ip' ] );
        if ( $validator->fails() )
        {
            throw new \Exception( 'Invalid IP: ' . $ip );
        }

        return $this->ips()->firstOrCreate( [
            'ip' => $ip,
        ] );
    }

}