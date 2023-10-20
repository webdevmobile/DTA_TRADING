<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Training;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class TrainingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return strtolower($user->role) === 'admin'
                ? Response::allow()
                // : Response::denyWithStatus(404);
                : Response::deny('Seul les administrteurs ont accès à cette fonctionnalités');
    }

    /**
     * Determine whether the user can view the model. voir une formation en particulier
     */
    public function view(User $user, Training $training): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Training $training): bool
    {
        return strtolower($user->role) == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Training $training): bool
    {
        return strtolower($user->role) == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Training $training): bool
    {
        return strtolower($user->role) == 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Training $training): bool
    {
        return strtolower($user->role) == 'admin';
    }
}
