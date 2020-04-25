<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
  public function index(Request $request)
  {
      $q = $request->input('q');
      $products = Product::where('title', 'LIKE', '%' . $q . '%')->paginate(10);
      return view('search', ['products' => $products, 'search' => $q]);
  }
}
