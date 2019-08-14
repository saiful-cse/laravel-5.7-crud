<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=> 'required|string',
            'item_price' => 'required|integer'
        ]);
        $item = new Item([
            'coffee_name' => $request->get('item_name'),
            'coffee_desc'=> $request->get('item_description'),
            'coffee_price'=> $request->get('item_price')
        ]);
        $item->save();
        return redirect('/coffee')->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);
        return view('items.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=> 'required|string',
            'item_price' => 'required|integer'
        ]);

        $item = Item::find($id);
        $item->coffee_name = $request->get('item_name');
        $item->coffee_desc = $request->get('item_description');
        $item->coffee_price = $request->get('item_price');
        $item->save();

        return redirect('/coffee')->with('success', 'Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::find($id);
        $items->delete();

        return redirect('/coffee')->with('success', 'Item has been deleted Successfully');
    }
}
