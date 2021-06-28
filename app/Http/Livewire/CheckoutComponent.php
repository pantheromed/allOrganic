<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $thankyou;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $address;
    public $city;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_address;
    public $s_city;
    public $s_country;
    public $s_zipcode;

    public $payement_mode;


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname'=>'required',
             'lastname'=>'required',
             'email'=>'required|email',
             'mobile'=>'required|numeric',
             'address'=>'required',
             'city'=>'required',
             'country'=>'required',
             'zipcode'=>'required|numeric'
        ]);
        if($this->ship_to_different)
        {
            $this->validateOnly($fields,[
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_mobile'=>'required|numeric',
                's_address'=>'required',
                's_city'=>'required',
                's_country'=>'required',
                's_zipcode'=>'required|numeric'
           ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
             'firstname'=>'required',
             'lastname'=>'required',
             'email'=>'required|email',
             'mobile'=>'required|numeric',
             'address'=>'required',
             'city'=>'required',
             'country'=>'required',
             'zipcode'=>'required|numeric'
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total = session()->get('checkout')['total'];
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->tax = session()->get('checkout')['tax'];

        $order->firstname=$this->firstname;
        $order->lastname=$this->lastname;
        $order->email=$this->email;
        $order->mobile=$this->mobile;
        $order->address=$this->address;
        $order->city=$this->city;
        $order->country=$this->country;
        $order->zipcode=$this->zipcode;
        $order->status='ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_mobile'=>'required|numeric',
                's_address'=>'required',
                's_city'=>'required',
                's_country'=>'required',
                's_zipcode'=>'required|numeric'
           ]);

           $shipping = new Shipping();
           $shipping->order_id = $order->id;
           $shipping->firstname=$this->s_firstname;
           $shipping->lastname=$this->s_lastname;
           $shipping->email=$this->s_email;
           $shipping->mobile=$this->s_mobile;
           $shipping->address=$this->s_address;
           $shipping->city=$this->s_city;
           $shipping->country=$this->s_country;
           $shipping->zipcode=$this->s_zipcode;
           $shipping->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyCheckout()
     {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }
    
    public function render()
    {
        $this->verifyCheckout();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(3);
        return view('livewire.checkout-component', [ 'lproducts'=>$lproducts])->layout("layouts.base");
    }
}
