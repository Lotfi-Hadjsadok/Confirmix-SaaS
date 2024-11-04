<?php

namespace App\Livewire\Page\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Livewire\WithoutUrlPagination;


class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function orders()
    {
        $credentials =
            array(
                'email' => '',
                'password' => '',
            );

        return Order::query()

            ->paginate(5);
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
        $this->dispatch('notify', variant: 'info', title: __('Deleted!'), message: __('Order deleted succefully.'));
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.page.orders.index', array(
            'orders' => $this->orders()
        ));
    }
}
