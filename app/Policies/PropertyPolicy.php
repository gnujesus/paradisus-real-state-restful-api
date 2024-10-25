<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropertyPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny(User $user)
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Property $property): bool
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can create models.
     */
    public function store(User $user): Response
    {
        $isAgent = $user->role === "agn";

        if (!$isAgent) {
            return Response::deny("Your role doesn't allow you to do this operation", 401);
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Property $property): Response
    {
        $isAgent = $user->role === "agn";
        $hasAmenity = $user->id === $property->agent_id;

        if (!$isAgent) {
            return Response::deny("Your role doesn't allow you to do this operation", 401);
        }

        if (!$hasAmenity) {
            return Response::deny("You don't own this", 401);
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, Property $property): Response
    {
        $isAgent = $user->role === "agn";
        $hasAmenity = $user->id === $property->agent_id;

        if (!$isAgent) {
            return Response::deny("Your role doesn't allow you to do this operation", 401);
        }

        if (!$hasAmenity) {
            return Response::deny("You don't own this", 401);
        }


        return Response::allow();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Property $property): bool
    {
        return $user->role == "agn";
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Property $property): bool
    {
        return $user->role == "agn";
    }
}
