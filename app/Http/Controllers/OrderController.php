<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{

    /**
     * Voir la page des commandes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('administration.orders.index');
    }

    /**
     * Voir une commande
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function view (Order $order) {
        $user = Auth::user();
        if ($user->id == $order->user_id || $user->id == $order->restaurent_id || $user->role == 3)
            return view('administration.orders.show', compact('order'));
        return redirect()->route('orders.index');
    }

    /**
     * Route datatables
     * @return mixed
     */
    public function dataTable () {
        $user = Auth::user();
        $query = null;
        switch ($user->role) {
            case 2 :
                $query = DB::table('orders')->where('restaurent_id', $user->id);
                break;
            case 3 :
                $query = Order::query();
                break;
            default :
                $query = DB::table('orders')->where('user_id', $user->id);
                break;
        }
        return DataTables::of($query)->make(true);
    }


    public function api (Request $request) {
        Log::info($request->all());

        return response()->json(['success' => true]);
    }

}
