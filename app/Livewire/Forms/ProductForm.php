<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Order;
use App\Enums\OrderStatus;
use Livewire\Attributes\Validate;

class ProductForm extends Form
{
    public Order $order;

    public $employee;

    public $employer;

    public $client_name;

    public $client_phone;

    public $client_state;

    public $client_city;

    public $product_name;

    public $product_price;

    public $shipping_cost;

    public $quantity;

    public $total_price;

    public $note;

    public $status;


    public function init(Order $order)
    {
        $this->order = $order;
        $this->employee = $order->employee_id;
        $this->employer = $order->employer_id;
        $this->client_name = $order->client->name;
        $this->client_state = $order->client->state;
        $this->client_city = $order->client->city;
        $this->client_phone = $order->client->phone;
        $this->product_name = $order->product->name;
        $this->product_price = $order->product_price;
        $this->shipping_cost = $order->shipping_cost;
        $this->quantity = $order->quantity;
        $this->total_price = $order->total_price;
        $this->note = $order->note;
        $this->status = $order->status;
    }

    public function updateStatus()
    {
        $this->order->status = $this->status;
        $this->order->save();
    }

    public function updateNote()
    {
        $this->order->note = $this->note;
        $this->order->save();
    }

    public function updateEmployee()
    {
        $this->order->employee_id = $this->employee;
        $this->order->save();
    }

    public function updateOrder()
    {
        $this->order->client->name = $this->client_name;
        $this->order->client->phone = $this->client_phone;
        $this->order->client->state = $this->client_state;
        $this->order->client->city = $this->client_city;
        $this->order->client->save();

        $this->order->product->price = $this->product_price;
        $this->order->shipping_cost = $this->shipping_cost;
        $this->order->quantity = $this->quantity;
        $this->order->total_price = $this->total_price;
        $this->order->save();
    }
}
