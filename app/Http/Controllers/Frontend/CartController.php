<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class CartController extends Controller
{
    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ));
    } // End Method

    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } //End Method

    public function AddToCartDetails(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartHomeNewProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartHomeNewProductCategory(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartFeaturedProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartRelatedProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartSubCategoryProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartVendorDetailsProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryOneProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryTwoProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryThreeProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryFourProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryFiveProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Removed Product From Your Cart!']);
    } // End Method

    public function MyCart()
    {
        return view('frontend.mycart.view_mycart');
    } //End Method

    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ));
    } //End Method

    public function CartRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Removed Product From Your Cart!']);
    } //End Method

    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json('Decrement');
    } //End Method

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('Increment');
    } //End Method


    public function CouponApply(Request $request){

        $coupon = Coupon::where('coupon_code',$request->coupon_code)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            Session::put('coupon',[
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100 )
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
        } else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    }// End Method
}
