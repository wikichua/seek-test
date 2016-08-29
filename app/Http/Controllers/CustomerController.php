<?php

namespace SEEK\Http\Controllers;

use Illuminate\Http\Request;

use SEEK\Http\Requests;
use SEEK\Http\Controllers\Controller;
use SEEK\Http\Misc\ShiftingTrait;
use SEEK\Customer;

class CustomerController extends Controller
{
    use ShiftingTrait;

    public function __construct()
    {

    }

    public function index()
    {
        $this->reorganizeSEQ(new Customer);
     	$Customers = Customer::search()->sort()->orderBy('seq','desc')->paginate(25);
        $this->index_shift($Customers, new Customer);
        return view('customer.index')->with(compact('Customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $Customer = Customer::create(
                array(
                        'seq' => Customer::max('seq') + 1,
                        'name' => $request->get('name'),
                        'code' => $request->get('code'),
                    )
            );

        return redirect()->route('customer')->with('success','Record created.');
    }

    public function edit($id)
    {
        $Customer = Customer::find($id);
        return view('customer.edit')->with(compact('Customer'));
    }

    public function update(Request $request, $id)
    {
        $Customer = Customer::find($id);
        $Customer->name = $request->get('name',$Customer->name);
        $Customer->code = $request->get('code',$Customer->code);
        $Customer->save();

        return back()->with('success','Record Updated.');
    }

    public function destroy($id)
    {
        session()->flash('success','Record deleted.');
        return Customer::destroy($id);
    }

    public function shift($id, $shift_id)
    {
        $this->shifting(new Customer, $id, $shift_id);

        return back();
    }
}
