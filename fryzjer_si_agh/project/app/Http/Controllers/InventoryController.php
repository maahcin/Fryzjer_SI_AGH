<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    //select p.id, p.name, sum(i.quantity) from products p left join inventories i on p.id=i.product_id group by p.id, p.name;
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        /*
        $deliveries = DB::select(DB::raw("
        SELECT * FROM deliveries AS d
            LEFT JOIN delivery__products AS dp ON d.id = dp.id_delivery
            LEFT JOIN products AS p ON dp.id_product = p.id
            WHERE d.id = $id
        "));
        return view('delivery.show')->with('deliveries', $deliveries);
        //$deliveries=Delivery::all();
        return view('inventory.index');
            //->with('deliveries', $deliveries);
        */
        $inventory = DB::select(DB::raw("select p.id, p.name, sum(i.quantity) as sum from products p left join inventories i on p.id=i.product_id group by p.id, p.name;"));
        return view('inventory.index')->with('inventory', $inventory);
    }
}
