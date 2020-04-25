<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\Product;
use Auth;


class HistoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    function index(){
      $userId = Auth::user()->id;
      $orders = History::orderBy("id", "desc")->where('userId', "=", $userId)->get();
      return view('history', ['orders' => $orders]);
    }
}
