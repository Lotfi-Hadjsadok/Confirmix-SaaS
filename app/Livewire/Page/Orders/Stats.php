<?php

namespace App\Livewire\Page\Orders;

use App\Models\Product;
use Illuminate\Contracts\Database\Query\Builder;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;

class Stats extends Component
{
    #[Reactive]
    public Filters $filters;
    public  $labels;
    public  $data;
    public function render()
    {
        return view(
            'livewire.page.orders.stats',
            array(
                'products_with_orders_count' => $this->productWithOrdersCount(),
            )
        );
    }


    public function productWithOrdersCount()
    {
        // $credentials =
        //     array(
        //         'email' => 'jaleel11@example.com',
        //         'password' => 'admin',
        //     );

        // if (Auth::attempt($credentials)) {
        //     session()->regenerate();
        // }

        $data =  Product::query()
            ->join('orders', 'products.id', '=', 'orders.product_id')
            ->tap(function ($query) {
                Auth::user()->is_employee ?
                    $query->where('orders.employee_id', Auth::user()->employee->id) :
                    $query->where('orders.employer_id', Auth::user()->employer->id);
            })
            ->whereIn('products.id', $this->filters->selectedProducts)
            ->select('products.id', 'products.name')
            ->selectRaw('COUNT(orders.product_id) as total_order_count')
            ->groupBy('products.id', 'products.name')
            ->get();

        $this->labels = $data->pluck('name')->toArray();
        $this->data = $data->pluck('total_order_count')->toArray();
    }
}
