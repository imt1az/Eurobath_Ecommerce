<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
  public function MyOrders()
  {
      $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
      return view('frontend.user.order.order_view',compact('orders'));
  }

  public function OrderDetails($id)
  {
      $order = Order::with('division','district','state','user')->where('id',$id)->where('user_id',Auth::id())->first();
      $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
      return view('frontend.user.order.order_details',compact('order','orderItem'));
  }


    public function invoiceDownload($id){

        $order = Order::with('division','district','state','user')->where('id',$id)->where('user_id',Auth::id())->first();

        $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();



        $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([

            'tempDir' => public_path(),

            'chroot' => public_path(),

        ]);

        return $pdf->download('invoice.pdf');

         //      return view('frontend.user.order.order_invoice',compact('order','orderItem'));
   }



   public function ReturnOrder(Request $request,$id){
      Order::findOrFail($id)->update([
         'return_date'=>Carbon::now()->format('d F Y'),
          'return_reason' => $request->return_reason,
          'return_order' => 1,
      ]);
       $notification = array(
           'message' => 'Return Request Send Successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('my.orders')->with($notification);

   }

   //ReturnOrderList
    public function ReturnOrderList()
    {
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order_view',compact('orders'));
    }

    //CancelOrderList
    public function CancelOrderList()
    {
        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order_view',compact('orders'));
    }

    //OrderTracking
    public function OrderTracking(Request $request){



      $invoice = $request->code;
      $track = Order::where('invoice_no',$invoice)->first();

      if($track){
          return view('frontend.tracking.track_order',compact('track'));
      }
      else{
          $notification = array(
              'message' => 'Invalid invoice code',
              'alert-type' => 'error'
          );

          return redirect()->back()->with($notification);
      }

    }
}
