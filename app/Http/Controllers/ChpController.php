<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use Carbon\Carbon;
use Validator;

use App\ChpDetail;
use App\Customer;
use App\Product;
use App\Chp;

class ChpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function __construct()
    {
        $this->middleware('bowner_employee');
    }
    */

    public function index()
    {
        $products = Product::pluck('name', 'id')->all();
        $customers = Customer::all();

        $orders = Chp::orderBy('created_at', 'asc')->paginate(10);

        return view('chp.chp', compact('orders', 'products', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Chp();

        $order->customer_id = $request['customer'];
        $order->user_id = Auth::user()->id;
        $order->vat = $request['vat'];
        $order->note = $request['note'];
        //$order->delivery_at = date("Y-m-d", strtotime($request['delivery_at'] . "+1 day"));
        $order->delivery_at = date("Y-m-d", strtotime($request['delivery_at'] ));
        
        $order->save();

        // Filter empty array elements
        $products = array_filter($request->products);
        $i = 0;
        $total_cost_order = 0;
        foreach ($products as $product) {
            $orderDetail = new ChpDetail;
            $orderDetail->product_id = $product;
            $quantity = $orderDetail->quantity = $request->quantity[$i];
            $i++;
            $cost = Product::where('id', $product)->value('cost');
            $vat_rate = Product::where('id', $product)->value('vat_rate');
            if ($order->vat) {
                $total_cost = ($cost * $quantity) + ( $cost * $quantity * $vat_rate / 100 );
            } else {
                $total_cost = $cost * $quantity;
              }
            $total_cost_order += $total_cost;
            $orderDetail->total_cost = $total_cost;
            $orderDetail->order_id = $order->id;
            $orderDetail->save();
        }

        $order->total_cost = $total_cost_order;

        $order->save();

        Session::flash('created_message', 'The order has been created!');

        return redirect('/chp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Chp::findOrFail($id);

        return view('chp.print', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Chp::findOrFail($id);
        $products = Product::pluck('name', 'id')->all();
        $customers = Customer::all();
        $details = ChpDetail::where('order_id', $id)->get();
        $delivery_at = date("d-m-Y", strtotime($order->delivery_at));

        return view('chp.edit', compact('order', 'details', 'products', 'customers', 'delivery_at'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $order = Chp::findOrFail($id);
        $order->customer_id = $request['customer'];
        $order->user_id = Auth::user()->id;
        $order->vat = $request['vat'];
        $order->note = $request['note'];
        $order->delivery_at = date("Y-m-d", strtotime($request['delivery_at'] ));

        // Filter empty array elements
        $products = array_filter($request->products);
        $i = 0;
        $total_cost_order = 0;
        $order->chpdetail()->delete();
        foreach ($products as $product) {
            $orderDetail = new ChpDetail;
            $orderDetail->product_id = $product;
            $quantity = $orderDetail->quantity = $request->quantity[$i];
            $i++;
            $cost = Product::where('id', $product)->value('cost');
            $vat_rate = Product::where('id', $product)->value('vat_rate');
            if ($order->vat) {
                $total_cost = ($cost * $quantity) + ( $cost * $quantity * $vat_rate / 100 );
            } else {
                $total_cost = $cost * $quantity;
              }
            $total_cost_order += $total_cost;
            $orderDetail->total_cost = $total_cost;
            $orderDetail->order_id = $order->id;
            $orderDetail->save();
        }

        $order->total_cost = $total_cost_order;
        
        $order->save();

        Session::flash('updated_message', 'The order has been updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = Chp::findOrFail($id);
        $order->delete();

        Session::flash('deleted_message', 'The order has been deleted');

        return redirect('/chp');
    }

    public function complete($id)
    {
        $order = Chp::findOrFail($id);
        $order->status = 1;

        // For Undo feature
        /*
        $order->status = !$order->status;
        if ($order->status == 1) {
            $product_qty = $order->product->quantity - $order->quantity;
        } else {
            $product_qty = $order->product->quantity + $order->quantity;
        }
        */

        $order->save();

        Session::flash('updated_message', 'The order has been completed');

        return redirect('/chp');
    }

    public function submit($id)
    {
        $order = Chp::findOrFail($id);
        $order->submit = 1;
        $order->save();

        return redirect('/chp');
    } 

    public function deliver($id)
    {
        $order = Chp::findOrFail($id);
        $order->deliver = 1;
        $order->save();

        $details = $order->orderdetail()->get();
        foreach ($details as $detail) {
            $product = Product::findOrFail($detail->product_id);
            // Update product inventory quantity
            $product->quantity = $product->quantity - $detail->quantity;  
            $product->save();  
        }

        Session::flash('updated_message', 'The order delivery has been submitted');

        return redirect('/chp');
    } 
}
