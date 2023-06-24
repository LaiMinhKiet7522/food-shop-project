<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AllUserController extends Controller
{
    public function UserAccount()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_details', compact('userData'));
    } //End Method

    public function UserChangePassword()
    {
        return view('frontend.userdashboard.user_change_password');
    } //End Method

    public function UserOrderPage()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.userdashboard.user_order_page', compact('orders'));
    } //End Method

    public function UserOrderDetails($order_id)
    {
        $order = Order::with('city', 'district', 'commune', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderDetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.order.order_details', compact('order', 'orderItem'));
    } //End Method

    public function UserInvoiceDownload($order_id)
    {
        $order = Order::with('city', 'district', 'commune', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderDetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('frontend.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption(['tempDir' => public_path(), 'chroot' => public_path()]);
        return $pdf->download('invoice.pdf');
    } //End Method

    public function ReturnOrderPage()
    {
        $orders = Order::where('user_id', Auth::id())->where('return_date', '!=', NULL)->orderBy('return_date', 'DESC')->get();
        return view('frontend.order.return_order_view', compact('orders'));
    } //End Method

    public function ReturnOrderSubmit(Request $request, $order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y H:i:s'),
            'return_reason' => $request->return_reason,
            'return_order_status' => 1,
        ]);
        $notification = array(
            'message' => 'Submit Order Return Request Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.order.page')->with($notification);
    } //End Method

    public function ReturnOrderDetails($order_id)
    {
        $order = Order::with('city', 'district', 'commune', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderDetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.order.return_order_details', compact('order', 'orderItem'));
    } //End Method

    public function CancelOrderPage()
    {
        $orders = Order::where('user_id', Auth::id())->where('cancel_date', '!=', NULL)->orderBy('cancel_date', 'DESC')->get();
        return view('frontend.order.cancel_order_view', compact('orders'));
    } //End Method

    public function CancelOrderSubmit(Request $request)
    {
        $order_id = $request->order_id;
        Order::findOrFail($order_id)->update([
            'cancel_date' => Carbon::now()->format('d F Y H:i:s'),
            'cancel_order_status' => 1,
        ]);
        $notification = array(
            'message' => 'Order Cancellation Request Successful!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.order.page')->with($notification);
    } //End Method

    public function CancelOrderDetails($order_id)
    {
        $order = Order::with('city', 'district', 'commune', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderDetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.order.cancel_order_details', compact('order', 'orderItem'));
    } //End Method

    public function UserTrackOrderPage()
    {
        return view('frontend.userdashboard.user_track_order');
    } //End Method

    public function UserOrderTracking(Request $request)
    {
        $invoice_number = $request->code;
        $user_id = Auth::user()->id;
        $track = Order::where('user_id', $user_id)->where('invoice_number', $invoice_number)->first();

        if ($track) {
            return view('frontend.tracking.track_order', compact('track'));
        } else {
            $notification = array(
                'message' => 'Invoice Number Is Invalid!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } //End Method
}
