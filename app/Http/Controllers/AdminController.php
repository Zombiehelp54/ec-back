<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;

class AdminController extends Controller
{

    function login(){
      if(isset($_GET['username']) && isset($_GET['password']) && $_GET['username'] === env('ADMIN_USER',null) && $_GET['password'] === env('ADMIN_PASS', null)){
        session(['isAdmin' => 'true']);
        return redirect('/admin');
      } else {
        return view('admin.login');
      }
    }
    function logout(){
      session(['isAdmin' => 'false']);
      return redirect('/admin/');
    }
    function index(Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      $products = Product::orderBy("id", "desc")->where('id', '!=', -1)->paginate(10);
      $cats = Category::orderBy("id", "desc")->get();
      return view('admin', ['products' => $products, 'cats' => $cats]);
    }
    function editProduct($id,Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      $product = Product::find($id);
      $cats = Category::all();
      return view('admin.product', ['product' => $product, 'cats' => $cats]);
    }
    function editProductAction(Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      $id = $request->input('id');
      $product = Product::find($id);
      $title = $request->input('title');
      $category = $request->input('category');
      $nstock = $request->input('nstock');
      $price = $request->input('price');
      $description = $request->input('description');
      if ($request->file('img') != null && $request->file('img')->isValid()) {
          $file = $request->file('img');
          $img =  $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          if(in_array($ext, ['png', 'jpg', 'jpeg', 'gif'])){
            $file->move('uploads/products/',$img);
          } else {
            $img = $product['img'];
          }
      } else {
        $img = $product['img'];
      }
      $affected = DB::table('products')
              ->where('id', $id)
              ->update(['title' => $title, 'category' => $category , 'nstock' => $nstock, 'price' => $price, 'description' => $description, 'img' => $img]);
      return redirect("/admin/product/$id/edit");

    }

    function deleteProduct($id, Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      DB::delete('delete from products where id = ?',[$id]);
      return redirect("/admin/");
    }

    function editCategory($id, Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }

      $cat = Category::find($id);
      return view('admin.category', ['cat'=>$cat]);
    }
    function editCategoryAction(Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      $id = $request->input('id');
      $category = Category::find($id);
      $title = $request->input('title');
      $description = $request->input('description');
      if ($request->file('img') != null && $request->file('img')->isValid()) {
          $file = $request->file('img');
          $img =  $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          if(in_array($ext, ['png', 'jpg', 'jpeg', 'gif'])){
            $file->move('uploads/categories/',$img);
          } else {
            $img = $category['img'];
          }
      } else {
        $img = $category['img'];
      }
      $affected = DB::table('categories')
              ->where('id', $id)
              ->update(['title' => $title, 'description' => $description, 'img' => $img]);
      return redirect("/admin/category/$id/edit");

    }


    function deleteCategory($id, Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      DB::delete('delete from categories where id = ?',[$id]);
      return redirect("/admin/");
    }

    function newProduct(Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      $cats = Category::all();
      return view('admin.newproduct', ['cats' => $cats]);
    }

    function newProductAction(Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      $title = $request->input('title');
      $category = $request->input('category');
      $nstock = $request->input('nstock');
      $price = $request->input('price');
      $description = $request->input('description');
      if ($request->file('img') != null && $request->file('img')->isValid()) {
          $file = $request->file('img');
          $img =  $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          if(in_array($ext, ['png', 'jpg', 'jpeg', 'gif'])){
            $file->move('uploads/products/',$img);
          } else {
            $img = "invalid";
          }
      } else {
        $img = "invalid";
      }
      DB::table('products')->insert(
        ['title' => $title, 'category' => $category , 'nstock' => $nstock, 'price' => $price, 'description' => $description, 'img' => $img]
      );
      return redirect("/admin/");
    }

    function newCategory(Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      return view('admin.newcategory');
    }

    function newCategoryAction(Request $request){
      if($request->session()->get('isAdmin') != 'true'){
        return redirect('/admin/login');
      }
      $title = $request->input('title');
      $description = $request->input('description');
      if ($request->file('img') != null && $request->file('img')->isValid()) {
          $file = $request->file('img');
          $img =  $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          if(in_array($ext, ['png', 'jpg', 'jpeg', 'gif'])){
            $file->move('uploads/categories/',$img);
          } else {
            $img = "invalid";
          }
      } else {
        $img = "invalid";
      }
      DB::table('categories')->insert(
        ['title' => $title, 'description' => $description, 'img' => $img]
      );
      return redirect("/admin/");
    }
}
