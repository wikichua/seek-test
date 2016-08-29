<?php

namespace SEEK\Http\Controllers;

use Illuminate\Http\Request;

use SEEK\Http\Requests;
use SEEK\Http\Requests\CheckoutStoreRequest;
use SEEK\Http\Controllers\Controller;
use SEEK\PricingRule;
use SEEK\Customer;
use SEEK\Item;
use SEEK\Checkout;
use SEEK\Http\Misc\Checkout as Chkout;

class CheckoutController extends Controller
{
    public function __construct()
    {

    }

    public function index($customer_id = 0)
    {
        if(!$customer_id)
            return redirect()->route('customer')->with('error','Please select a customer.');

        $total = 0;
        $items = Item::lists('Name','code');
        $Checkouts = Checkout::where('customer_id',$customer_id)->sort()->get();
        return view('checkout.index')->with(compact('Checkouts','customer_id','items','total'));
    }

    public function store(CheckoutStoreRequest $request, $customer_id)
    {
        $Checkout = Checkout::firstOrCreate(
                array(
                        'customer_id' => $customer_id,
                        'item_code' => $request->get('item_code'),
                    )
            );

        $Checkout->quantity += $request->get('quantity',1);

        $Chkout = new Chkout($customer_id);
        for ($i=0; $i < $Checkout->quantity; $i++) { 
            $Chkout = $Chkout->add($Checkout->item_code);
        }

        $Checkout->price = $Chkout->total();
        $Checkout->save();

        return redirect()->route('checkout',$customer_id)->with('success','Record created.');
    }

    public function destroy($id, $customer_id)
    {
        return Checkout::where('id',$id)->where('customer_id',$customer_id)->delete();
    }

    public function show($customer_id)
    {
        $items = array();
        $Customer = Customer::find($customer_id);
        $Checkouts = Checkout::where('customer_id',$customer_id)->get();
        foreach ($Checkouts as $Checkout)
        {
            for ($i=0; $i < $Checkout->quantity; $i++) { 
                $items[] = $Checkout->item_code;
            }

            $total = isset($total)? $total + $Checkout->price:$Checkout->price;
        }
        
        // Checkout::where('customer_id',$customer_id)->delete();

        return view('checkout.show')->with(compact('Checkouts','Customer','total','items'));
    }
}
