<?php

namespace App\Livewire\Page\Orders;

use App\Models\Order;
use Livewire\Component;
use App\Livewire\Forms\ProductForm;

class OrderRow extends Component
{
    public Order $order;

    public ProductForm $form;

    public function render()
    {
        return view('livewire.page.orders.order-row');
    }
    public function mount()
    {
        $this->form->init($this->order);
    }

    public function refreshOrderWithToast()
    {
        $this->order->refresh();
        $this->dispatch('notify', variant: 'success', title: __('Success'), message: __('Order updated.'));
    }

    public function updateStatus()
    {
        $this->authorize('update', $this->order);
        $this->form->updateStatus();
        $this->refreshOrderWithToast();
    }

    public function updateNote()
    {
        $this->authorize('update', $this->order);
        $this->form->updateNote();
        $this->refreshOrderWithToast();
    }

    public function updateEmployee()
    {
        $this->authorize('update-employee', $this->order);
        $this->form->updateEmployee();
        $this->refreshOrderWithToast();
    }

    public function updateOrder()
    {
        $this->form->updateOrder();
        $this->refreshOrderWithToast();
    }
}
