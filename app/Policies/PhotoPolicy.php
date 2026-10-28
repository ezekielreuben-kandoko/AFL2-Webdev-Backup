<?php

namespace App\Policies;

use App\Models\Photo;
use App\Models\User;

class PhotoPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Photo $photo): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Photo $photo): bool
    {
        return false;
    }

    public function delete(User $user, Photo $photo): bool
    {
        return false;
    }

    public function restore(User $user, Photo $photo): bool
    {
        return false;
    }

    public function forceDelete(User $user, Photo $photo): bool
    {
        return false;
    }
}
