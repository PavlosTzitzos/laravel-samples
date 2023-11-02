<?php

namespace App\Policies;

use App\Models\Producer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProducerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if(($user->role == 'admin')||($user->role == 'editor')||($user->role == 'user'))
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Producer $producer): bool
    {
        if(($user->role == 'admin')||($user->role == 'editor')||($user->role == 'user'))
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->role == 'admin')
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Producer $producer): bool
    {
        if($user->role == 'admin')
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Producer $producer): bool
    {
        if($user->role == 'admin')
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Producer $producer): bool
    {
        if($user->role == 'admin')
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Producer $producer): bool
    {
        if($user->role == 'admin')
        {
            return true;
        }
        return false;
    }
}
