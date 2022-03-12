<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('admin.units.index',['units' => $units]);
    }

    public function create(){
        return view('admin.units.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $unit = new Unit;

        $unit->name = $request->name;

        $unit->save();
        return to_route('admin.units')->with('success','Unit created successfully');
    }

    public function edit($id){
        $unit = Unit::find($id);

        return view('admin.units.edit',['unit' => $unit]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required'
        ]);
        
        $unit = Unit::find($id);

        $unit->name = $request->name;
        $unit->save();

        return to_route('admin.units')->with('success','Unit updated successfully');

    }

    public function destroy($id){
        $unit = Unit::find($id);

        $unit->delete();

        return to_route('admin.units')->with('success','Unit deleted successfully');

    }
}
