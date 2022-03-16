<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id'=>'required',
            'product_id'=>'required',
            'status'=>'required',
        ]);

        $order = new Order([
            'reservation_id' => $request->reservation_id,
            'product_id' => $request->product_id,
            'status' => $request->status,
        ]);

        $order->save();

        return redirect()->back()->with('success', '+1');
    }


    public function show($id)
    {
        $reservation = Reservation::find($id);
        $products = Product::all();
        $res_id = $id;
        return view('order.index' , compact(['products', 'reservation'], ));
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
