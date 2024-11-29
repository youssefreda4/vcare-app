<?php

namespace App\Policies;

use App\Models\User;

class MajorPolicy
{
    //                     name , model
    //use in route {->can('view','major')}
    public function view(User $user){
        return $user->role == 'patient';
    }
}
