<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function PendingOrders()
    {
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function PendingOrdersDetails($id)
    {
        $order = Order::with('division','district','state','user')->where('id',$id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders_details',compact('order','orderItem'));
    }

    public function ConfirmOrders()
    {
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));
    }

    public function ProcessingOrders()
    {
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function PickedOrders()
    {
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrders()
    {
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrders()
    {
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }

    public function CancelOrders()
    {
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel_orders',compact('orders'));
    }



    //PendingToConfirm
    public function PendingToConfirm($id)
    {
        Order::findOrFail($id)->update([
           'status'=>'confirm',
        ]);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending-orders')->with($notification);
    }

    //ConfirmToProcessing
    public function ConfirmToProcessing($id)
    {
        Order::findOrFail($id)->update([
            'status'=>'processing',
        ]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirm-orders')->with($notification);
    }

    //ProcessingToPicked
    public function ProcessingToPicked($id)
    {
        Order::findOrFail($id)->update([
            'status'=>'picked',
        ]);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-orders')->with($notification);
    }

    //PickedToShipped
    public function PickedToShipped($id)
    {
        Order::findOrFail($id)->update([
            'status'=>'shipped',
        ]);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);
    }

    //ShippedToDelivered
    public function ShippedToDelivered($id)
    {
        $product = OrderItem::where('order_id',$id)->get();
        foreach ($product as $item){
            Product::where('id',$item->product_id)
                ->update([
                   'product_qty'=>DB::raw('product_qty-'.$item->qty)
                ]);
        }
        Order::findOrFail($id)->update([
            'status'=>'delivered',
        ]);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);
    }

    //DeliveredToCancel
    public function DeliveredToCancel($id)
    {
        Order::findOrFail($id)->update([
            'status'=>'cancel',
        ]);

        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('delivered-orders')->with($notification);
    }

    //AdminInvoiceDownload
    public function AdminInvoiceDownload($id){

        $order = Order::with('division','district','state','user')->where('id',$id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
        $pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');


    }
}
