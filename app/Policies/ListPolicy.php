<?php

namespace App\Policies;

use App\Models\List;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\List  $list
     * @return mixed
     */
    public function view(User $user, List $list)
    {
        return in_array($user->email, [
            'admin@admin.com',
        ]);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\List  $list
     * @return mixed
     */
    public function update(User $user, List $list)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\List  $list
     * @return mixed
     */
    public function delete(User $user, List $list)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\List  $list
     * @return mixed
     */
    public function restore(User $user, List $list)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\List  $list
     * @return mixed
     */
    public function forceDelete(User $user, List $list)
    {
        //
    }
}
