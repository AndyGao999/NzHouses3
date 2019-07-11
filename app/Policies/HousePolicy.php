<?php

namespace App\Policies;

use App\User;
use App\House;
use Illuminate\Auth\Access\HandlesAuthorization;

class HousePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any houses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the house.
     *
     * @param  \App\User  $user
     * @param  \App\House  $house
     * @return mixed
     */
    public function view(User $user, House $house)
    {
        //
    }

    /**
     * Determine whether the user can create houses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return in_array($user->email,[
         'rooney.gao@outlook.com',
       ]);
    }




    /**
     * Determine whether the user can update the house.
     *
     * @param  \App\User  $user
     * @param  \App\House  $house
     * @return mixed
     */
    public function update(User $user, House $house)
    {
        return auth()->user()->id===$house->user_id;
    }

    /**
     * Determine whether the user can delete the house.
     *
     * @param  \App\User  $user
     * @param  \App\House  $house
     * @return mixed
     */
    public function delete(User $user, House $house)
    {
        return auth()->user()->id===$house->user_id;
    }

    /**
     * Determine whether the user can restore the house.
     *
     * @param  \App\User  $user
     * @param  \App\House  $house
     * @return mixed
     */
    public function restore(User $user, House $house)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the house.
     *
     * @param  \App\User  $user
     * @param  \App\House  $house
     * @return mixed
     */
    public function forceDelete(User $user, House $house)
    {
        //
    }
}
