<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function test () {
        return response()->json(['data' => 'data']);
    }

    public function createOrder (Request $request) {

    }

    public function paiement (Request $request) {

    }

    public function getProduct (User $user) {

    }

    public function inscription (Request $request) {

    }
}
