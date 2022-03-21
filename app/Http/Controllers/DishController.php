<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dishes', ['dishes' => Dish::all()]);
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
        $request->validate([
            'name' => 'required|unique:dishes',
            'price' => 'required'
        ]);

        Dish::create($request->only('name', 'price'));
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $Dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $Dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $Dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('dishes_edit', ['dish' => $dish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $Dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        // dd($request->only('name', 'price'));
        $dish->update($request->only('name', 'price'));
        return redirect('dishes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $Dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return back();
    }
}
