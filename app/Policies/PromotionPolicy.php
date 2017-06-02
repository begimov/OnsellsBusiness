<?php

namespace App\Policies;

use App\User;
use App\Models\Promotions\Promotion;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromotionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->promotions()->count() < config('promotions.limit');
    }

    public function edit(User $user, Promotion $promotion)
    {
        return $user->isModerator() && $promotion->active === 0;
    }

    public function destroy(User $user, Promotion $promotion)
    {
        return $user->id === $promotion->user_id || ($user->isModerator() && $promotion->active === 0);
    }
}
