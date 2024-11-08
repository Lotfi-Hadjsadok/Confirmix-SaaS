<?php

namespace App\Livewire\Page\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Reactive;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    use WithPagination, WithoutUrlPagination;
    #[Reactive]
    public Filters $filters;

    public function orders()
    {

        $query = Auth::user()->is_employee ?
            Auth::user()->employee->orders() :
            Auth::user()->employer->orders();

        $query = $this->filters->FilterByProducts($query);
        $query = $this->filters->FilterByStatus($query);

        return $query->paginate(5);
    }



    public function deleteOrder(Order $order)
    {
        $order->delete();
        $this->dispatch('notify', variant: 'info', title: __('Deleted!'), message: __('Order deleted succefully.'));
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.page.orders.table', array(
            'orders' => $this->orders(),
        ));
    }
}
