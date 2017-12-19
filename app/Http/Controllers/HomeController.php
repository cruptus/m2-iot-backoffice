<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role > 1)
            return redirect()->route('dashboard');
        $user = Auth::user();
        $commandes = Order::where('user_id', $user->id)->count();
        return view('users.dashboard', compact('user', 'commandes'));
    }

    public function recharger (Request $request) {
        $user = Auth::user();
        if ($user->role == 1) {
            $validation = $this->validate($request, [
                    'credit' => 'required|numeric'
                ]);
            $user->solde = $user->solde + $validation['credit'];
            $user->save();
        }
        return redirect()->route('home');
    }

    public function admin () {
        return view('administration.dashboard');
    }

    public function register (string $token) {
        $user = User::where('token', $token)->firstOrFail();
        return view('auth.register', compact('user'));
    }

    public function registerPost(Request $request) {
        $validation = $this->validate($request, $this->rules(), ['regex' => __('passwords.password')]);
        $user = User::where('token', $validation['token'])->firstOrFail();
        $user->password = bcrypt($validation['password']);
        $user->token = null;
        $user->save();
        return redirect()->route('login');
    }

    private function rules () : array {
        return [
            'password' => [
                'required',
                'confirmed',
                'min:6',
            ],
            'token' => 'required|regex:/^[a-zA-Z0-9]+$/'
        ];
    }
}
