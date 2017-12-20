<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
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
        try {
            $uid = $request->all()[0]['uid'];
            $total = 0;
            foreach ($request->all()[0]['products'] as $product) {
                $total = $total + $product['prix'];
            }
            $user = User::where('uid', $uid)->first();
            if ($user) {

            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false], 403);
        }
        return response()->json(['success' => false], 403);

        Log::info($request->all());
        $uid =
        Log::info();

        return response()->json(['success' => true]);
    }

}
