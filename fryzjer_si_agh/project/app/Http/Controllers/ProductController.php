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
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function cost(Request $request)
    {
        switch ($request->input('action')) {
            case 'cal':
                $sdate = $request->input('sdate');
                $edate = $request->input('edate');
                if($sdate>$edate){
                    return view('products.cost')->with('err', "nieprawidłowy okres czasu, koniec musi być być później niż początek");
                }
                $request->request->remove('sdate');
                $request->request->remove('edate');
                if (empty($sdate)) {
                    $date = DB::select(DB::raw("SELECT date FROM deliveries ORDER BY date ASC LIMIT 1"));
                    $sdate = $date[0]->date;
                }
                if (empty($edate)) {
                    $date = DB::select(DB::raw("SELECT date FROM deliveries ORDER BY date DESC LIMIT 1"));
                    $edate = $date[0]->date;
                }

                $sum = DB::select(DB::raw("SELECT sum FROM deliveries WHERE date BETWEEN '$sdate' AND '$edate'"));
                $s = 0;

                foreach ($sum as $ss) {
                    $s = $s + (int)$ss->sum;
                }
                if (empty($s)) {
                    $s=0;
                }
                return view('products.cost')->with('sum', $s)->with('sdate', $sdate)->with('edate', $edate);
            case 'report':
                $sdate = $request->input('sdate');
                $edate = $request->input('edate');
                $request->request->remove('sdate');
                $request->request->remove('edate');
                if (empty($sdate)) {
                    $date = DB::select(DB::raw("SELECT date FROM deliveries ORDER BY date ASC LIMIT 1"));
                    $sdate = $date[0]->date;
                }
                if (empty($edate)) {
                    $date = DB::select(DB::raw("SELECT date FROM deliveries ORDER BY date DESC LIMIT 1"));
                    $edate = $date[0]->date;
                }

                $sum = DB::select(DB::raw("SELECT sum FROM deliveries WHERE date BETWEEN '$sdate' AND '$edate'"));
                $s = 0;

                $items = array();
                foreach ($sum as $ss) {
                    $s = $s + (int)$ss->sum;
                    $items[] = (int)$ss->sum;
                }
                $string=implode(",", $items);
                $now = date("Y-m-d");
                $now2 = date("Y-m-d h:i:sa");
                $pdf = Pdf::loadView('products.report', ['s' => $s,'sdate'=>$sdate,'edate'=>$edate,'now2'=>$now2,'now'=>$now,'string'=>$string]);
                // download PDF file with download method
                return $pdf->download('Raport_'.$now . '.pdf');
                break;
        }
        return view('products.cost');
    }
}
