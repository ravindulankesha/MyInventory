<?php

namespace App\Http\Controllers;

use App\Models\inventories;
use App\Models\Stock;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
    }

    public function add(Request $request)
    {
        $validation_info=$request->validate([
            'item_name' => 'required|string|unique:inventories,item_name',
            'item_description' => 'required',
            'quantity_per_unit' => 'required|numeric|min:1'
        ]);

        inventories::create(
            [
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'quantity_per_unit' => $request->quantity_per_unit
            ]
        );

        return redirect()->route('home');

    }

    public function loadView(){
        $inventories=Stock::with('inventories')->get();
        // dd($inventories);
        return view('inventoriesSupplyForm',["inventories" => $inventories]);
    }
    public function loadInventories(){
        $inventories=inventories::get();
        return view('fillStockForm',["inventories" => $inventories]);
    }

    public function itemStock(Request $request){
        $item_id = $request->item_id;
        $stock=Stock::select('total_quantity')->where('inventory_item_id',$item_id)->get();
        // $stock=Stock::get();
        return  response()->json(['stock'=>$stock]);
    }

    public function addUnits(Request $request){
        $item_id = $request->item;
        $units = $request->units;
        // print_r($item_id);
        $quantityPerUnit= inventories::select('quantity_per_unit')->where('id',$item_id)->get()->toArray();

        $quantity_to_add=$quantityPerUnit[0]['quantity_per_unit']*$units;

        $exists = Stock::where('inventory_item_id', $item_id)->exists();
        if($exists){
            Stock::where('inventory_item_id',$item_id)->increment('total_quantity',$quantity_to_add);
        }
        else{
            Stock::create(
                [
                    'inventory_item_id' => $item_id,
                    'total_quantity' => $quantity_to_add
                ]
            );
        }
        return redirect()->route('home');
    }

    public function supply(Request $request){
        $quantity_taken=$request->quantity;
        $item_id=$request->item_id;
        Stock::where('inventory_item_id',$item_id)->decrement('total_quantity',$quantity_taken);
        return redirect()->route('home');
    }

    public function view(Request $request){
        $inventories=inventories::get();
        return view('viewInventories',["inventories" => $inventories]);
    }

    public function destroy($id)
    {
        inventories::where('id',$id)->delete();
        return redirect()->route('viewInventories');
    }

    public function edit($id){
        $editItem=inventories::where('id',$id)->get();
        return view('editInventory',["inventories" => $editItem]);
    }

    public function update(Request $request, $id)
    {
        $validation_info=$request->validate([
            'item_name' => 'required',
            'item_description' => 'required',
            'quantity_per_unit' => 'required|numeric|min:1'
        ]);

        inventories::where('id',$id)->update([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'quantity_per_unit' => $request->quantity_per_unit
        ]);

        return redirect()->route('viewInventories');
    }

    public function loadChartData(){
        $stock=Stock::with('inventories')->get();
        $values= [];
        $labels= [];
        foreach($stock as $key=>$value){
            array_push($values, $value['total_quantity']);
            array_push($labels, $value['inventories']['item_name']);
        }
        return  response()->json(['data'=>$values,'labels'=>$labels]);
    }
}
