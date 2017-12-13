<?php

namespace App\Http\Controllers;

use App\Mail\RegisterEmail;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    private $path = "/images/upload";

    /**
     * Affiche tous les utilisateurs
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index () {

        return view('administration.products.index');
    }

    /**
     * Supprime un utilisateur
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Product $product) {
        $product->delete();
        return redirect()->route('products.index');
    }


    /**
     * Affiche le formulaire pour visualiser un utilisateur
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view (Product $product) {
        return view('administration.products.show', compact('product'));
    }


    public function create (Request $request) {
        $input = $this->validate($request, $this->validator());
        $input['user_id'] = Auth::id();

        $image = $request->file('image');
        $tmp['imagename'] = time().'.'.$image->extension();
        $destinationPath = public_path($this->path);
        $input["image"] =  $this->path.'/'.$tmp['imagename'];
        Product::create($input);
        $image->move($destinationPath, $tmp['imagename']);
        return redirect()->route('products.index');
    }

    public function update(Request $request, Product $product) {
        $input = $this->validate($request, $this->validator());
        $image = $request->file('image');
        if ($image) {
            $tmp['imagename'] = time().'.'.$image->extension();
            $destinationPath = public_path($this->path);
            $input["image"] =  $this->path.'/'.$tmp['imagename'];
            $image->move($destinationPath, $tmp['imagename']);
        } else {
            $input["image"] = $product->image;
        }
        $product->update($input);
        return redirect()->route('products.index');
    }


    public function show () {
        return view('administration.products.show');
    }

    /**
     * Routes for datatables with ajax
     * @return mixed
     */
    public function dataTable () {
        $products = DB::table('products')->where('user_id', Auth::id());
        return DataTables::of($products)->make(true);
    }

    public function api (Request $request) {
        if (!empty($request->header('Id'))) {
            $user = User::find($request->header('Id'));
            Product::where('user_id', $user->id)->get()->toJson();
            if ($user) {
                return response()->json(Product::where('user_id', $user->id)->get(), 200);
            }
        }
        return response()->json(['error' => 'No ID'], 403);
    }

    public function validator () : array {
        return [
            'titre' => 'required|string',
            'prix' => 'required|numeric',
            'is_plat' => 'required|boolean',
            'description' => 'required|string',
            'image' => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ];
    }
}
