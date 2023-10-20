<?php

namespace App\Policies;

use App\Models\Trade;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TradePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        // $trade = new Trade();
        return strtolower($user->role) === 'user' || strtolower($user->role) === 'admin'
        ? Response::allow()
        // : Response::denyWithStatus(404);
        : Response::deny('Seul les utilisateurs ont accès à cette fonctionnalités');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Trade $trade)
    {
        // return $user->id === $trade->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Trade $trade)
    {
        // $trade = new Trade();
        return strtolower($user->role) === 'user' || strtolower($user->role) === 'admin' && $user->id === $trade->user_id
        ? Response::allow()
        // : Response::denyWithStatus(404);
        : Response::deny('Vous n\'est pas le propriétaire du trade');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Trade $trade)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Trade $trade)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Trade $trade)
    {
        //
    }
}
