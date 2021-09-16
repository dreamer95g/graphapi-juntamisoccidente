<?php

namespace App\Policies\Payroll;

use App\Models\Payroll\Payroll;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PayrollPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny()
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Payroll  $payroll
     * @return mixed
     */
    public function view()
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
     * @param  \App\Models\Payroll\Payroll  $payroll
     * @return mixed
     */
    public function update(User $user)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Payroll  $payroll
     * @return mixed
     */
    public function delete(User $user)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Payroll  $payroll
     * @return mixed
     */
    public function restore(User $user)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll\Payroll  $payroll
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        $role = $user->roles()->first()->name;
        return $role == "admin" || $role == "secretary";
    }
}
