<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = "pending";
    case TO_RECALL = "to_recall";
    case RESCHEDULED = "rescheduled";
    case CONFIRMED = "confirmed";
    case SHIPPED = "shipped";
    case DELIVERED = "delivered";
    case CANCELLED = "cancelled";
    case NOT_DELIVERED = "not_delivered";

    public function label(): string
    {
        return match ($this) {
            self::CONFIRMED => __('Confirmed'),
            self::PENDING => __('Pending'),
            self::CANCELLED => __('Cancelled'),
            self::NOT_DELIVERED => __('Not Delivered'),
            self::TO_RECALL => __('To Recall'),
            self::RESCHEDULED => __('Rescheduled'),
            self::DELIVERED => __('Delivered'),
            self::SHIPPED => __('Shipped'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::CONFIRMED => 'bg-info/10 text-info',
            self::PENDING => 'bg-info/10 text-info',
            self::TO_RECALL => 'bg-warning/10 text-warning',
            self::CANCELLED => 'bg-error/10 text-error',
            self::NOT_DELIVERED => 'bg-error/10 text-error',
            self::RESCHEDULED => 'bg-info/10 text-info',
            self::DELIVERED => 'bg-success/10 text-success',
            self::SHIPPED => 'bg-success/10 text-success',
        };
    }
}
