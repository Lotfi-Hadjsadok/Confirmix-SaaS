<?php

namespace App\Livewire\Page\Orders;

use App\Enums\OrderStatus;
use Livewire\Form;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class Filters extends Form
{


    #[Url(as: 'products')]
    public $selectedProducts = [];

    #[Url(as: 'statuses')]
    public FilterStatus $selectedStatus = FilterStatus::All;

    public function init()
    {
        if (empty($this->selectedProducts)) {
            $this->selectedProducts = $this->products()->pluck('id')->toArray();
        }
    }

    public function products()
    {
        // $credentials =
        //     array(
        //         'email' => 'jaleel11@example.com',
        //         'password' => 'admin',
        //     );

        // if (Auth::attempt($credentials)) {
        //     session()->regenerate();
        // }
        return Auth::user()->is_employee ?
            Auth::user()->employee->employer->products :
            Auth::user()->employer->products;
    }



    public function filterByProducts($query)
    {
        return  $query->whereIn('product_id', $this->selectedProducts);
    }

    public function filterByStatus($query)
    {
        if ($this->selectedStatus == FilterStatus::All) {
            return $query;
        }
        return $query->where('status', $this->selectedStatus);
    }
}
