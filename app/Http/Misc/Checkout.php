<?php
namespace SEEK\Http\Misc;
use SEEK\PricingRule;
use SEEK\Customer;
use SEEK\Item;

class Checkout
{
	private $customer_code;
	private $pricing_rules = array();
	private $items = array();

    public function __construct($customer_id)
    {
        $this->customer_code = Customer::find($customer_id)->code;
    }

    public function add($item_code)
    {
    	if(isset($this->items[$item_code]))
	    	$this->items[$item_code]++;
	    else
	    	$this->items[$item_code] = 1;
    	return $this;
    }

    public function total()
    {
    	$total = 0;
    	foreach ($this->items as $item_code => $quantity) {
			$PricingRule = PricingRule::where('customer_code',$this->customer_code)->where('item_code',$item_code)->first();

    		if($PricingRule)
    		{    			
				if($PricingRule->operator != '>=')
				{
    				if($quantity == $PricingRule->quantity)
    				{
    					$total += $PricingRule->special_price;
    				}elseif($quantity > $PricingRule->quantity){
    					$include_quantity = (int)floor($quantity/$PricingRule->quantity);
    					$remain_quantity = $quantity - ($PricingRule->quantity * $include_quantity);
    					$total += ($PricingRule->special_price * $include_quantity) + (Item::where('code',$item_code)->first()->price * $remain_quantity);
    				}
				}else{
					if($quantity >= $PricingRule->quantity)
					{
    					$total += $PricingRule->special_price * $quantity;
					}else{
		    			$total += Item::where('code',$item_code)->first()->price * $quantity;
					}
				}
    		}else{
    			$total += Item::where('code',$item_code)->first()->price * $quantity;
    		}
    	}

    	return $total;
    }

}