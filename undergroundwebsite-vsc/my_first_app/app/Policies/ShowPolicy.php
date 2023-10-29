<?php

namespace App\Policies;

use App\Models\Show;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ShowPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // this is for ShowController@index
        return ($user->role == 'admin')||($user->role == 'editor')||($user->role == 'user');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Show $show): bool
    {
        // everyone can see he show info
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Show $show): bool
    {
        //
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Show $show): bool
    {
        //
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Show $show): bool
    {
        //
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Show $show): bool
    {
        //
        return $user->role == 'admin';
    }
}
