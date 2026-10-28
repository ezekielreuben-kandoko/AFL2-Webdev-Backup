<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;

class VideoPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Video $video): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Video $video): bool
    {
        return false;
    }

    public function delete(User $user, Video $video): bool
    {
        return false;
    }

    public function restore(User $user, Video $video): bool
    {
        return false;
    }

    public function forceDelete(User $user, Video $video): bool
    {
        return false;
    }
}
