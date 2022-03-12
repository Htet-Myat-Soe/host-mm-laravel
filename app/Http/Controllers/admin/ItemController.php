<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = Item::all();
        return view('admin.items.index',['items' => $items]);
    }

    public function create(){
        $units = Unit::all();

        return view('admin.items.create',['units' => $units]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $unitId = $request->units;

        $item = new Item;

        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
        $item->units()->attach($unitId);

        return to_route('admin.items')->with('success','Item created successfully');
    }

    public function edit($id){
        $item = Item::find($id);
        $units = Unit::all();

        return view('admin.items.edit',['item' => $item,'units' => $units]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $unitId = $request->units;

        $item = Item::find($id);

        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
        $item->units()->sync($unitId);

        return to_route('admin.items')->with('success','Item updated successfully');
    }

    public function destroy($id){

        $item = Item::find($id);

        $item->units()->detach();

        $item->delete();

        return to_route('admin.items')->with('success','Item deleted successfully');

    }
}
