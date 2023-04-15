<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\HasEnsure;
use App\Helpers\ManageImages;
//use App\Models\Order;
//use App\Models\RepairRequest;
use App\Models\Delivery;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $name = $request->input('name');
        $cost=$request->input('cost');
        $data=array(
            "name"=>$name,
            "cost"=>$cost);

        DB::table('products')->insert($data);

        $products=Product::all();
        return view('products.index')->with('products', $products);
    }

    public function create_products(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('products.create');
    }

    public function show(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products=Product::all();
        return view('products.index')->with('products', $products);
    }
}
