<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class frontendpagescontroll extends Controller
{
    public function index()
    {
        //$getcat = Category::all();
        //$mycat=Category::with('Product')->get();
        $pro = Category::with('Product')->get();
        //
        return view("frontend.index", ['pro' => $pro]);
    }

    public function allcategory(String $slug)
    {
        $allcat = Product::where("category_slug", $slug)->get();
        return view("frontend.products.allcategorypage", ['allcat' => $allcat]);
    }


    public function details(String $slug)
    {
        $prodetails = Product::where("slug", $slug)->firstOrFail();
        //return $prodetails->id;

        $relatedpro = Product::where('category_slug', $prodetails->category_slug)->get();

        return view('frontend.products.details', ['relatedpro' => $relatedpro, 'prodetails' => $prodetails]);
    }


    public function addtocart($id)
    {

        $checkpro = Product::find($id);
        $checkcart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        $checkwish = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();

        if ($checkpro) {
            // return $checkpro;
            if($checkwish){
                $checkwish = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->delete();
            }
            if (!$checkcart) {
                $addtocart = new Cart;
                $addtocart->product_id = $checkpro->id;
                $addtocart->price = $checkpro->price - $checkpro->discount;
                $addtocart->qty = 1;
                $addtocart->user_id = Auth::user()->id;
                $addtocart->save();
                $checkpro->qty= $checkpro->qty-1;
                $checkpro->update();
                return redirect()->back();
            } else {
                if ($checkwish) {
                    $checkwish = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->delete();
                }
                $checkcart->qty = $checkcart->qty + 1;
                $checkcart->price = $checkcart->price + $checkpro->price - $checkpro->discount;
                $checkcart->update();
                $checkpro->qty = $checkpro->qty - 1;
                $checkpro->update();
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function cartpage()
    {
        return view('frontend.products.cartpage');
    }

    public function removeitem($id)
    {
       $checkcart=Cart::where('id',$id)->where('user_id',Auth::user()->id)->first();

       if(!$checkcart){
            return redirect()->back();
       }
       $checkpro=Product::where('id', $checkcart->product_id)->first();
        $checkpro->qty= $checkpro->qty+ $checkcart->qty;
        $checkpro->update();
       Cart::destroy($id);
        return redirect()->back();
    }


    //remove and update items
    public function removeallcart()
    {
        $allcat = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($allcat as $post) {
            $res[] = [
                'id'=> $post->id,
                'product_id' => $post->product_id,
                'qty' => $post->Product->qty + $post->qty,
            ];
            $mypro = Product::where('id', $post->product_id)->update(['qty' => $post->Product->qty + $post->qty,]);

            Cart::destroy($post->id);
        };

        return redirect()->back();
    }

    public function addtowishlist($id)
    {
        if(Auth::user()){
            $checkcat = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
            $checkwishlist = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
            $checkpro = Product::find($id);
            if (!$checkcat) {
                if (!$checkwishlist) {
                    $wishlist = new Wishlist;
                    $wishlist->product_id = $checkpro->id;
                    $wishlist->user_id = Auth::user()->id;
                    $wishlist->save();
                    return redirect()->back();
                }
                return redirect()->back();
            }
            return redirect()->back();

        }else{
            return redirect()->route('login');
        }

    }

    public function mywishlist()
    {
        $wishdata=Wishlist::where('user_id',Auth::user()->id)->get();
        return view('frontend.products.mywishlist',['wishdata'=> $wishdata]);
    }


    public function checkout()
    {
        return view('frontend.products.checkout');
    }
}
