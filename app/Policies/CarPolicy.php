<?php

namespace App\Policies;

use App\User;
use App\Car;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * @param  \App\User  $user
     * @param  \App\Car  $car
     * @return mixed
     */
    public function action(User $user, Car $car)
    {
        return $user->owns($car);
    }
}
