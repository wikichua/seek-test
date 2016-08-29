<?php

namespace SEEK\Http\Controllers;

use Illuminate\Http\Request;

use SEEK\Http\Requests;
use SEEK\Http\Controllers\Controller;
use SEEK\Http\Misc\ShiftingTrait;
use SEEK\Item;

class ItemController extends Controller
{
    use ShiftingTrait;

    public function __construct()
    {

    }

    public function index()
    {
        $this->reorganizeSEQ(new Item);
     	$Items = Item::search()->sort()->orderBy('seq','desc')->paginate(25);
        $this->index_shift($Items, new Item);
        return view('item.index')->with(compact('Items'));
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $Item = Item::create(
                array(
                        'seq' => Item::max('seq') + 1,
                        'name' => $request->get('name'),
                        'code' => $request->get('code'),
                        'price' => $request->get('price'),
                    )
            );

        return redirect()->route('item')->with('success','Record created.');
    }

    public function edit($id)
    {
        $Item = Item::find($id);
        return view('item.edit')->with(compact('Item'));
    }

    public function update(Request $request, $id)
    {
        $Item = Item::find($id);
        $Item->name = $request->get('name',$Item->name);
        $Item->code = $request->get('code',$Item->code);
        $Item->price = $request->get('price',$Item->price);
        $Item->save();

        return back()->with('success','Record Updated.');
    }

    public function destroy($id)
    {
        session()->flash('success','Record deleted.');
        return Item::destroy($id);
    }

    public function shift($id, $shift_id)
    {
        $this->shifting(new Item, $id, $shift_id);

        return back();
    }
}
