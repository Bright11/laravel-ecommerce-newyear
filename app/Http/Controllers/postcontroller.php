<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function addcartdb(Request $req)
    {

        $validated = $req->validate([
            'name' => 'required|unique:categories',

            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        //composer require intervention/image
        $slug = $req->name;
        $myslug= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));
        $cat=new Category;
        $cat->name=$req->name;
        $cat->slug=$myslug;
        if ($req->hasFile('image')) {

        $path = $cat->image = $req->image->store('public/categoryimg');

         $cat->image= $path;
        }
        $cat->save();
        return redirect()->route("category")->with('status','Successfull');
    }

    public function insertproduct(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|unique:products',
            'description'=>'required',
            'keywords'=>'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        //name category_id price qty discount image
        //description keywords slug
        $pro = new Product;

        $slug = $req->name;
        $proslug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));

        $pro->name=$req->name;
        $pro->category_slug=$req->category;
        $pro->price=$req->price;
        $pro->qty = $req->qty;
      //  if ($req->has('discount_price')) {
            if (!empty($req->input('discount_price'))) {
            $pro->discount = $req->discount_price;
        } else {
            $pro->discount = 0;
        }
        $pro->description=$req->description;
        $pro->keywords=$req->keywords;
        $pro->slug= $proslug;
        $path = $pro->image = $req->image->store('public/products');
        $pro->image = $path;
        $pro->save();
        return redirect()->route('viewproduct')->with("status",'successful');
    }
}
