<?php

namespace App\Http\Controllers;

use App\Mail\RegisterEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    /**
     * Affiche tous les utilisateurs
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index () {
        if (Auth::user()->role != 3)
            return redirect()->route('dashboard');
        return view('administration.users.index');
    }

    /**
     * Supprime un utilisateur
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user) {
        $user->delete();
        return redirect()->route('users.index');
    }


    /**
     * Affiche le formulaire pour visualiser un utilisateur
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view (User $user) {
        return view('administration.users.show', compact('user'));
    }


    public function create (Request $request) {
        $input = $this->validate($request, $this->validator());
        $input['password'] = 'temporaire';
        $input['token'] = md5(random_bytes(10).time().random_bytes(3).$input['name']);
        $user = User::create($input);
        Mail::to($user->email)->send(new RegisterEmail($user));
        return redirect()->route('users.index');
    }

    public function update(Request $request, User $user) {
        $input = $this->validate($request, $this->validator());
        $user->update($input);
        return redirect()->route('users.index');
    }


    public function show () {
        return view('administration.users.show');
    }

    /**
     * Routes for datatables with ajax
     * @return mixed
     */
    public function dataTable () {
        return DataTables::of(User::query())->make(true);
    }

    public function validator () : array {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => [
                'required',
                Rule::in([1,2,3])
            ]
        ];
    }
}
