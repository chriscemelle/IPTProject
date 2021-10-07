<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function index() {

        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create() {
        return view('items.create');
    }

    public function store(Request $resquest) {

        $resquest->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        Item::create([
            'name' => request('name'),
            'desc' => request('desc'),
            'price' => request('price'),
            'quantity' => request('quantity')
        ]);

        return redirect('/items')->with('Message', 'Item Has Been Added.');
    }

    public function edit(Item $item) {

        return view('items.edit', ['item' => $item]);
    }

    public function delete(Item $item) {

        return view('items.index', ['item' => $item]);
    }


    public function update(Item $item) {

        request()->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $item->update([
            'name' => request('name'),
            'desc' => request('desc'),
            'price' => request('price'),
            'quantity' => request('quantity')
        ]);

        return redirect('/items')->with('Message', 'Items Updated.');
    }

    public function destroy(Item $item) {
        $item->delete();

        return redirect('/items')->with('Message', 'One Item Deleted.');
    }
}
