<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormCategoryPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        
    }
}
