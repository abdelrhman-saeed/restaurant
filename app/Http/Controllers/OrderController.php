<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishOrders;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ( ! $request->ajax()) {
            return abort(401, 'unauthorized');
        }
        $dishes     = Dish::whereIn('id', array_keys($request->dishes))->get();
        $dishData   = [];

        foreach($request->dishes as $dishID => $dishCount) {
            $dishData[] = [
                'dish_id' => $dishID,
                'dish_count' => $dishCount
            ];
        };

        $total_price = 0;

        foreach($dishes as $dish) {
            $total_price += $dish->price * $request->dishes[$dish->id];
        }

        $request->merge(['total_price' => $total_price]);

        $order = Order::create($request->only('table_id', 'total_price', 'customer_count'));
        $order->dishes()->attach($dishData);

        return response(['order_id' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if( ! $request->ajax()) {
            return abort(401, 'unauthorized');
        }

        // $request->validate([
        //     ''
        // ])

        $dishes = Dish::whereIn('id', array_keys($request->dishes))->get(['id', 'price']);
        $total_price = 0;

        foreach($dishes as $dish) {
            $total_price += $dish->price * ( $request->dishes[$dish->id]['dish_count'] );
        }

        $request->merge(['total_price' => $total_price]);

        $order->dishes()->sync($request->dishes);
        $order->update($request->only('customer_count', 'table_id', 'total_price'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->dishes()->detach();
        $order->delete();
        
        return response('Done!');
    }
}
