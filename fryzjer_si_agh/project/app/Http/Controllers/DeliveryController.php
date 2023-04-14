<?php

namespace App\Http\Controllers;

use App\Helpers\HasEnsure;
use App\Helpers\ManageImages;
//use App\Models\Order;
//use App\Models\RepairRequest;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $idd=DB::select(DB::raw("SELECT id FROM deliveries ORDER BY id DESC LIMIT 1"));
        if (!empty($idd)) {
            $lastId = (int)$idd[0]->id;
        } else {
            $lastId = 0;
        }

        $suma=0;
        $products=Product::all();
        foreach ($products as $product) {
            $ile= $request->input($product->id);
            if ($ile>0) {
                $data=array(
                    'id_delivery'=>$lastId+1,
                    "id_product"=>$product->id,
                    'quantity'=>$ile);
                DB::table('delivery__products')->insert($data);
                $data=array(
                    'product_id'=>$product->id,
                    'users_id'=>5,
                    'quantity'=>$ile,
                    'type'=>1,
                    'created_at'=>date("Y-m-d H:i:s"));
                DB::table('inventories')->insert($data);
                $suma=$suma+$ile*$product->cost;
            }
        }

        //======================================

        $date = $request->input('date');
        $sum = $suma;
        $data=array(
            "date"=>$date,
            "sum"=>$sum);

        DB::table('deliveries')->insert($data);

        $deliveries=Delivery::all();
        return view('delivery.index')->with('deliveries', $deliveries);
    }

    public function create_products(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products=Product::all();
        return view('delivery.create')->with('products', $products);
    }

    public function show(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $deliveries=Delivery::all();
        return view('delivery.index')->with('deliveries', $deliveries);
    }

    public function show2(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $deliveries = DB::select(DB::raw("
        SELECT * FROM deliveries AS d
            LEFT JOIN delivery__products AS dp ON d.id = dp.id_delivery
            LEFT JOIN products AS p ON dp.id_product = p.id
            WHERE d.id = $id
        "));
        return view('delivery.show')->with('deliveries', $deliveries);
    }

    public function raport(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $del = Delivery::all();
        $delpr = array(4, 5);
            /*DB::select(DB::raw("
                SELECT * FROM delivery__products
        "));*/
        return view('delivery.raport')->with('del', $del)->with('delpr', $delpr);
    }
}
