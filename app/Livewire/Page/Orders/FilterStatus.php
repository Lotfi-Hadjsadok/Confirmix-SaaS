<?php

namespace App\Livewire\Page\Orders;

use App\Enums\OrderStatus;

enum FilterStatus: string
{
    case All = 'all';
    case PENDING = OrderStatus::PENDING->value;
    case TO_RECALL = OrderStatus::TO_RECALL->value;
    case RESCHEDULED = OrderStatus::RESCHEDULED->value;
    case CONFIRMED = OrderStatus::CONFIRMED->value;
    case SHIPPED = OrderStatus::SHIPPED->value;
    case DELIVERED = OrderStatus::DELIVERED->value;
    case CANCELLED = OrderStatus::CANCELLED->value;
    case NOT_DELIVERED = OrderStatus::NOT_DELIVERED->value;


    public function label(): string
    {
        return match ($this) {
            self::All => __('All'),
            self::CONFIRMED => OrderStatus::CONFIRMED->label(),
            self::PENDING => OrderStatus::PENDING->label(),
            self::CANCELLED => OrderStatus::CANCELLED->label(),
            self::NOT_DELIVERED => OrderStatus::CANCELLED->label(),
            self::TO_RECALL => OrderStatus::TO_RECALL->label(),
            self::RESCHEDULED => OrderStatus::RESCHEDULED->label(),
            self::DELIVERED => OrderStatus::DELIVERED->label(),
            self::SHIPPED => OrderStatus::SHIPPED->label(),
        };
    }
}
