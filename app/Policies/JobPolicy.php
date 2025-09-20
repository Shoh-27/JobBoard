<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given job can be updated by the user.
     */
    public function update(User $user, Job $job)
    {
        return $user->id === $job->employer_id;
    }

    /**
     * Determine if the given job can be deleted by the user.
     */
    public function delete(User $user, Job $job)
    {
        return $user->id === $job->employer_id;
    }
}
