<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipCity;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::content()->count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ));
    } // End Method

    public function AddToCartQuickView(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } //End Method

    public function AddToCartDetails(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartHomeNewProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartHomeNewProductCategory(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartFeaturedProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartRelatedProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartSubCategoryProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryOneProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryTwoProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryThreeProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryFourProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartCategoryFiveProduct(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartProductSearch(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function AddToCartShopPage(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thumbnail, 'brand_id' => $request->brand_id],
            ]);
            return response()->json(['success' => 'Successfully Added Product To Your Cart!']);
        }
    } // End Method

    public function MyCart()
    {
        return view('frontend.mycart.view_mycart');
    } //End Method

    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::content()->count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ));
    } //End Method

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100, 2),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100, 2)
            ]);
        }
        return response()->json(['success' => 'Successfully Removed Product From Your Cart!']);
    } // End Method

    public function CartRemove($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100, 2),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100, 2)
            ]);
        }
        return response()->json(['success' => 'Successfully Removed Product From Your Cart!']);
    } //End Method

    public function CartRemoveAllProduct()
    {
        Cart::destroy();
        Session::forget('coupon');
        return redirect()->back();
    } //End Method

    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100, 2),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100, 2)
            ]);
        }
        return response()->json('Decrement');
    } // End Method

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['coupon_code'];
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();

            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100, 2),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100, 2)
            ]);
        }
        return response()->json('Increment');
    } //End Method

    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100, 2),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100, 2)
            ]);
            return response()->json(array(
                'success' => 'Coupon Applied Successfully!'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon!']);
        }
    } // End Method

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_code' => session()->get('coupon')['coupon_code'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // End Method

    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(array(
            'success' => 'Coupon Removed Successfully!'
        ));
    } // End Method

    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::content()->count();
                $cartTotal = Cart::total();
                $cities = ShipCity::orderBy('city_name', 'ASC')->get();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'cities'));
            } else {
                $notification = array(
                    'message' => 'Cart Is Empty. Please Select A Product To Buy!',
                    'alert-type' => 'error',
                );
                return redirect()->to('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'First You Need To Login To The Website!',
                'alert-type' => 'warning',
            );
            return redirect()->route('login')->with($notification);
        }
    } // End Method
}
