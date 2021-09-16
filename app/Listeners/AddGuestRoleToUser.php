<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Registered;
use App\User;
use Illuminate\Support\Facades\DB;

class AddGuestRoleToUser
{


    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    //DARLE ROL DE INVITADO AL USUARIO QUE SE REGISTRE
    public function handle(Registered $event)
    {
        $user = $event->user;

        $roles = $user->roles()->first();
        if ($roles == null) {
            DB::insert(' insert into role_user (role_id, user_id) values (?, ?) ', [6, $user->id]);
        }
    }
}
