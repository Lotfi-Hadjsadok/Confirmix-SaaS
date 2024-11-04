<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{

    public function update(User $user, Order $order): bool
    {
        return $order->employee->user->id == $user->id
            || $order->employer->user->id == $user->id;
    }

    public function updateEmployee(User $user, Order $order): bool
    {
        return $user->is_employer && $user->id == $order?->employer->user->id;
    }
}
