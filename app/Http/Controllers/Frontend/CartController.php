<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ShipDivision;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id)
    {
        if (Session::has('coupon')){
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL)
        {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'slug' =>  $product->product_slug_en,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);
            return response()->json(['success'=>'Successfully Added On Your Cart']);
        }

        else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'slug' =>  $product->product_slug_en,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);
            return response()->json(['success'=>'Successfully Added On Your Cart']);
        }
    }

    //Mini Cart
    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts'=>$carts,
            'cartQty'=>$cartQty,
            'cartTotal'=>$cartTotal,
        ));
    }

    /// remove mini cart
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);

    } // end mehtod

    //Wishlist
    public function AddToWishlist(Request $request,$product_id)
    {
        if (Auth::check())
        {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
           if (!$exists)
           {
               Wishlist::insert([
                   'user_id' => Auth::id(),
                   'product_id' => $product_id,
                   'created_at' => Carbon::now(),
               ]);
               return response()->json(['success'=>'Successfully Added On Your WishList']);
           }
           else{
               return response()->json(['error'=>'This Product Already On Your WishList']);
           }

        }
        else{
            return response()->json(['error'=>'Please Login Your Account']);
        }

    }

    public function CouponApply(Request $request)
    {


       $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
       if ($coupon)
       {
           $getTotal = Cart::total();
           $removeDot = str_replace('.', '', $getTotal);
           $removeComma = str_replace(',','', $removeDot);
           $cartTotal = $removeComma / 100;

           Session::put('coupon',[
               'coupon_name' => $coupon->coupon_name,
               'coupon_discount' => $coupon->coupon_discount,
               'discount_amount' => round($cartTotal * $coupon->coupon_discount/100),
               'total_amount' => round($cartTotal - $cartTotal * $coupon->coupon_discount/100)
           ]);
           return response()->json(array(
               'validity' => true,
               'success'=>'Coupon Applied Successfully')
           );
       }
       else{
           return response()->json(['error'=>'Invalid Coupon']);
       }
    }

    public function CouponCalculation(){

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    } // end method

    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(array('success'=>'Coupon Remove Successfully'));
    }


    //CheckOut
    public function CheckoutCreate()
    {
        if (Auth::check()){
           if (Cart::total() > 0)
           {
               $carts = Cart::content();
               $cartQty = Cart::count();
               $cartTotal = Cart::total();

               $divisions = ShipDivision::orderBy('division_name','ASC')->get();

              return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));
           }
           else{
               $notification = array(
                   'message' =>'Add product On Your Cart',
                   'alert-type' => 'error'
               );
               return redirect()->to('/')->with($notification);
           }
        }
        else{
            $notification = array(
                'message' =>'You need to login first',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }
}
