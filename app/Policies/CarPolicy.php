<?php

namespace App\Policies;

use App\User;
use App\Car;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the car.
     *
     * @param  \App\User  $user
     * @param  \App\Car  $car
     * @return mixed
     */
    public function view(User $user, Car $car)
    {
        return $user->owns($car) || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create cars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->user();
    }

    /**
     * Determine whether the user can update the car.
     *
     * @param  \App\User  $user
     * @param  \App\Car  $car
     * @return mixed
     */
    public function update(User $user, Car $car)
    {
        return $user->owns($car) || $user->is('admin');
    }

    /**
     * Determine whether the user can delete the car.
     *
     * @param  \App\User  $user
     * @param  \App\Car  $car
     * @return mixed
     */
    public function delete(User $user, Car $car)
    {
        return $user->owns($car) || $user->is('admin');
    }

    /**
     * Determine whether the user can restore the car.
     *
     * @param  \App\User  $user
     * @param  \App\Car  $car
     * @return mixed
     */
    public function restore(User $user, Car $car)
    {
        return $user->is('admin');
    }

    /**
     * Determine whether the user can permanently delete the car.
     *
     * @param  \App\User  $user
     * @param  \App\Car  $car
     * @return mixed
     */
    public function forceDelete(User $user, Car $car)
    {
        return $user->is('admin');
    }
}
