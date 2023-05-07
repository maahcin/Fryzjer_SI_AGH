<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Visit;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class VisitController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // todo
        return view('visits.index');
    }
    public function show(int $id): View
    {
        $userID = Auth::id();
        //$visit = Visit::find($id);
        $visit = DB::select(DB::raw("select v.id, s.name, s.cost, s.est_time_min, u.name as hairdresser_name, v.start_datetime, v.end_datetime, v.client_name, v.status
            from visits v
            join services s on v.services_id = s.id
            join users u on v.users_id = u.id
            where v.id = $id
            and v.users_id = $userID"));
        $products = DB::select(DB::raw("select p.id, p.name, sum(i.quantity) as quantity from products p join inventories i on p.id = i.product_id group by p.id, p.name having sum(i.quantity) > 0"));
        return view('visits.show')->with('visit', $visit[0])->with('products', $products);
    }
    public function update(Request $request, Visit $visit): RedirectResponse
    {
        $this->validate_quantities($this, $request);
        //$this->updateAndSave($visit, $request);
        return redirect()->route('visits.index');
        //return redirect()->route('visit.show', $visit);
    }

    /**
     * @throws ValidationException
     */
    private function validate_quantities(VisitController $vc, Request $request): void
    {
        $products = DB::select(DB::raw("select p.id, p.name, sum(i.quantity) as quantity from products p join inventories i on p.id = i.product_id group by p.id, p.name having sum(i.quantity) > 0"));
        $str = "";
        foreach ($products as $p) {
            $str = $str."'".$p->name."' => 'integer|max:".str($p->quantity)."',";
        //    $name = str($p->name);
         //   $q = $p->quantity;

        }
        $vc->validate($request, [
            'Farba brąz' => 'date',
        ]);
    }
    /*
     *
     *    private function validate_order(OrderController $oc, Request $request): void
    {
        $oc->validate($request, [
            'requestID' => 'exists:repair_requests,id',
            'employeeID' => 'exists:users,id',
            'startDatetime' => 'required',
            'estDuration' => 'required|numeric',
            'cost' => 'required|numeric'
        ]);
    }
     */
}
