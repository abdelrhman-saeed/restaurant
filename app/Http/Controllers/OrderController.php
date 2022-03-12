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
        
        Order::create($request->only('table_id', 'total_price', 'customer_count'))
        ->dishes()->attach($dishData);

        return response('Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $Order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $Order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $Order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $Order)
    {
        //
    }
}
