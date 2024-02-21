<?php

namespace App\Policies;

use App\Models\PlayerSanction;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlayerSanctionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole('Admin', 'Vocal');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PlayerSanction $playerSanction): bool
    {
        return $user->hasAnyRole('Admin', 'Vocal');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole('Admin', 'Vocal');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PlayerSanction $playerSanction): bool
    {
        return $user->hasAnyRole('Admin', 'Vocal');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PlayerSanction $playerSanction): bool
    {
        return $user->hasAnyRole('Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PlayerSanction $playerSanction): bool
    {
        return $user->hasAnyRole('Admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PlayerSanction $playerSanction): bool
    {
        return $user->hasAnyRole('Admin');
    }
}
