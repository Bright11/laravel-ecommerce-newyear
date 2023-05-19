<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class adminpagesController extends Controller
{
    //

    public function adminindex()
    {
        return view('admin.adminindex');
    }

    public function addproduct()
    {
        $getcat=Category::all();
        return view("admin.layouts.productform.addproduct",['getcat'=> $getcat]);
    }

    public function viewproduct()
    {
        $product=Product::all();
       return view("admin.layouts.productform.viewproduct",["product"=>$product]);
    }


    public function category()
    {
        $getcat= Category::all();
      //  dd($getcat);
        return view('admin.layouts.productform.category',["getcat"=> $getcat]);
    }
}
