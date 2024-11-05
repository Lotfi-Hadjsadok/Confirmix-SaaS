<?php

namespace App\Livewire\Page\Orders;

use Livewire\Component;

class Index extends Component
{
    public Filters $filters;

    public function mount()
    {
        $this->filters->init();
    }
    public function render()
    {
        return view('livewire.page.orders.index');
    }
}
