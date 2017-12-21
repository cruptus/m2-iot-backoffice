<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
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

        $products = Product::join('orders_products', 'orders_products.product_id', 'products.id')
                            ->where('orders_products.order_id', $order->id)
                            ->select(['products.titre as titre',
                                'products.description as description',
                                'products.image as image',
                                'products.prix as prix'
                            ])
                            ->get();
        return redirect()->route('orders.index', compact('products', 'order'));
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
            $orders = [];
            foreach ($request->all()[0]['products'] as $product) {
                $total = $total + $product['prix'];
            }
            $user = User::where('uid', $uid)->first();
            if ($user) {
                if($user->solde >= $total) {
                    $user->solde = $user->solde - $total;
                    $user->save();
                    $order = Order::create(['user_id' => $user->id, 'restaurent_id' => 4, 'total' => $total]);
                    foreach ($request->all()[0]['products'] as $product) {
                        $orders[] = ['order_id' => $order->id, 'product_id' => $product['id']];
                    }
                    DB::table('orders_products')->insert($orders);
                    Log::info('success');
                    return response()->json(['success' => true]);
                }
            }
        } catch (\Exception $exception) {
            Log::info('exception');
            return response()->json(['success' => false], 403);
        }
        Log::info('error');
        return response()->json(['success' => false], 403);
    }

}
