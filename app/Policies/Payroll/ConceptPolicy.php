<?php

namespace App\Policies\Payroll;

use App\Models\Payroll\Concept;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConceptPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Concept  $concept
     * @return mixed
     */
    public function view(User $user, Concept $concept)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Concept  $concept
     * @return mixed
     */
    public function update(User $user, Concept $concept)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Concept  $concept
     * @return mixed
     */
    public function delete(User $user, Concept $concept)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Concept  $concept
     * @return mixed
     */
    public function restore(User $user, Concept $concept)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Concept  $concept
     * @return mixed
     */
    public function forceDelete(User $user, Concept $concept)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }
}
