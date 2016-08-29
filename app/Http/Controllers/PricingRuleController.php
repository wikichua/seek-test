<?php

namespace SEEK\Http\Controllers;

use Illuminate\Http\Request;

use SEEK\Http\Requests;
use SEEK\Http\Controllers\Controller;
use SEEK\Http\Misc\ShiftingTrait;
use SEEK\PricingRule;
use SEEK\Customer;
use SEEK\Item;

class PricingRuleController extends Controller
{
    use ShiftingTrait;

    public function __construct()
    {

    }

    public function index()
    {
        $this->reorganizeSEQ(new PricingRule);
     	$PricingRules = PricingRule::search()->sort()->orderBy('seq','desc')->paginate(25);
        $this->index_shift($PricingRules, new PricingRule);
        return view('pricing_rule.index')->with(compact('PricingRules'));
    }

    public function create()
    {
        $customers = Customer::lists('Name','code');
        $items = Item::lists('Name','code');
        return view('pricing_rule.create')->with(compact('customers','items'));
    }

    public function store(Request $request)
    {
        $PricingRule = PricingRule::create(
                array(
                        'seq' => PricingRule::max('seq') + 1,
                        'customer_code' => $request->get('customer_code'),
                        'item_code' => $request->get('item_code'),
                        'name' => $request->get('name'),
                        'operator' => $request->get('operator'),
                        'quantity' => $request->get('quantity'),
                        'special_price' => $request->get('special_price'),
                    )
            );

        return redirect()->route('pricing_rule')->with('success','Record created.');
    }

    public function edit($id)
    {
        $PricingRule = PricingRule::find($id);
        $customers = Customer::lists('Name','code');
        $items = Item::lists('Name','code');
        return view('pricing_rule.edit')->with(compact('PricingRule','customers','items'));
    }

    public function update(Request $request, $id)
    {
        $PricingRule = PricingRule::find($id);
        $PricingRule->customer_code = $request->get('customer_code',$PricingRule->customer_code);
        $PricingRule->item_code = $request->get('item_code',$PricingRule->item_code);
        $PricingRule->name = $request->get('name',$PricingRule->name);
        $PricingRule->operator = $request->get('operator',$PricingRule->operator);
        $PricingRule->quantity = $request->get('quantity',$PricingRule->quantity);
        $PricingRule->special_price = $request->get('special_price',$PricingRule->special_price);
        $PricingRule->save();

        return back()->with('success','Record Updated.');
    }

    public function destroy($id)
    {
        session()->flash('success','Record deleted.');
        return PricingRule::destroy($id);
    }

    public function shift($id, $shift_id)
    {
        $this->shifting(new PricingRule, $id, $shift_id);

        return back();
    }
}
