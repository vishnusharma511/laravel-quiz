<?php

namespace App\Policies;

use App\Models\Quiz\UserSubjectAssignResult;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSubjectAssignResultPolicy
{
    use HandlesAuthorization;

    public function view(User $user, UserSubjectAssignResult $userSubjectAssignResult): bool
    {
        return $user->id === $userSubjectAssignResult->user_id;
    }
}
