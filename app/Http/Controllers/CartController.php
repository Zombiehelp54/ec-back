<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use Validator;
use DB;


class CartController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    function index(){
      $userId = Auth::user()->id;
      \Cart::session($userId);
      $items = \Cart::getContent();
      return view('cart', ['items' => $items]);
    }

    function action($id, Request $request){
      $userID = Auth::user()->id;
      if(isset($_GET['remove'])){
        \Cart::session($userID)->remove($id);
        return \Cart::getContent();
      } else {
      $quantity = $_GET['count'];
      $Product = Product::find($id);
      if($quantity > $Product['nstock'] || $quantity < 1){
        $request->session()->flash('alert-danger', 'Failed to add to cart. Product quantity exceeds the number of it in stock!');
        return 0;
      }
      $rowId = rand();

      \Cart::session($userID)->add(array(
        'id' => $rowId,
        'name' => $Product->title,
        'price' => $Product->price,
        'quantity' => $quantity,
        'attributes' => array(),
        'associatedModel' => $Product
      ));
      $request->session()->flash('alert-success', 'Successfully added product to cart!');
      return \Cart::getContent();
    }
  }

  function checkout(){
    $userId = Auth::user()->id;
    \Cart::session($userId);
    $items = \Cart::getContent();
    foreach($items as $item){
      $product = Product::find($item['associatedModel']['id']);
      DB::table('products') ->where('id', $item['associatedModel']['id']) ->update(['nstock' => $product['nstock'] - $item['quantity']]);
      DB::table('histories')->insert(['productId' => $item['associatedModel']['id'], 'quantity' => $item['quantity'], 'created_at' => now(), 'userId' => $userId]);
    }
    \Cart::clear();
    \Cart::session($userId)->clear();
    return redirect('/history');
  }

}
