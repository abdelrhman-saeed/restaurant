@extends('dashboard-layout')
@section('resource-dashboard')
    <ul class="py-2 p-0 m-0">

        <li class="py-4 muted-border row justify-content-between align-items-center">
            <span class="order_time col-1">Time</span>
            <span class="order_table_id col-1 text-secondary">Table</span>
            <span class="order_dishes col-8 text-secondary">Dishes</span>
            <button class="btn btn-dark new-order-btn col-2 p-3"> New Order </button>
        </li>

        {{--  form instance --}}
        <li class="py-4 muted-border order order-form-instance d-none">

            <div class="row justify-content-between">
                <span class="order_time col-1">14:39</span>
                <input type="text" class="fillable table_id col-1 text-secondary" placeholder="table">
                <span class="order_dishes col-9 text-secondary">Rice Chips, Bear</span>
                <span class="col-1 other-info-arrow"><i class="fa-solid fa-angle-right"></i></span>
            </div>

            <div class="other-info py-3 col-19 row muted-border-top mt-2">

                <div class="row">
                    <div class="col-3">
                        <input type="text" class="customer_count fillable col-4" placeholder="Num">
                        <span>Customers</span>
                    </div>
                    <div class="col-3">
                        <span>total price: </span>
                        <span class="total_price col-3">$0</span>
                    </div>
                </div>

                <div class="dishes-info my-4">

                    <div>
                        <p class="col-12">Dishes:</p>
                    </div>

                    <div class="dishes row">

                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <input type="text" class="dish_count fillable col-4" placeholder="quantity">
                                <input type="text" class="dish_name fillable mx-1 col-4" placeholder="Dish">
                                <span class="dish_total_price">$0</span>
                            </div>
                        </div>
                        
                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-3" placeholder="quantity">4</span>
                                    {{-- <select name="dish_id" id="" class="dash_name fillable col-3 d-inline"">
                                        <option value="1">Bear</option>
                                        <option value="2">Fries</option>
                                        <option value="3">Chicken</option>
                                        <option value="4">Rice</option>
                                    </select> --}}
                                <input class="dish_name enum-fillable mx-1 col-4" placeholder="Dish">
                                <span class="dish_total_price col-3">$0</span>
                            </div>
                        </div>

                    </div>

                </div>
                
                <div>
                    <button class="btn btn-dark create-btn p-3 px-4">Create</button>
                    <button class="btn btn-dark d-none delete-btn">Delete</button>
                    <button class="btn btn-dark d-none update-btn">Update</button>
                    <button class="btn btn-dark d-none save-btn">Save</button>
                    <button class="btn btn-dark d-none cancel-btn">Canel</button>
                </div>

            </div>

        </li>
        {{--  form instance --}}

        <li class="py-4 muted-border order">

            <div class="row justify-content-between">
                <span class="order_time col-1">14:39</span>
                <span class="fillable table_id col-1 text-secondary" placeholder="table">21</span>
                <span class="order_dishes col-9 text-secondary">Rice Chips, Bear</span>
                <span class="col-1 other-info-arrow"><i class="fa-solid fa-angle-right"></i></span>
            </div>

            <div class="other-info py-3 col-19 row muted-border-top mt-2">

                <div class="row">
                    <div class="col-3">
                        <span class="customer_count fillable col-4" placeholder="number">5</span>
                        <span>Customers</span>
                    </div>
                    <div class="col-3">
                        <span>total price: </span>
                        <span class="total_price col-3">$500</span>
                    </div>
                </div>

                <div class="dishes-info my-4">

                    <div>
                        <p class="col-12">Dishes:</p>
                    </div>

                    <div class="dishes row">

                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-4" placeholder="quantity">3</span>
                                <span class="dish_name fillable mx-1 col-4" placeholder="Dish">Rice</span>
                                <span class="dish_total_price">$100</span>
                            </div>
                        </div>
                        
                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-3" placeholder="quantity">4</span>
                                    {{-- <select name="dish_id" id="" class="dash_name fillable col-3 d-inline"">
                                        <option value="1">Bear</option>
                                        <option value="2">Fries</option>
                                        <option value="3">Chicken</option>
                                        <option value="4">Rice</option>
                                    </select> --}}
                                <span class="dish_name enum-fillable mx-1 col-4" placeholder="Dish">Bear</span>
                                <span class="dish_total_price col-3">$200</span>
                            </div>
                        </div>

                    </div>

                </div>
                
                <div>
                    <button class="btn btn-dark delete-btn">Delete</button>
                    <button class="btn btn-dark update-btn">Update</button>
                    <button class="btn btn-dark d-none save-btn">Save</button>
                    <button class="btn btn-dark d-none cancel-btn">Canel</button>
                </div>

            </div>

        </li>

        <li class="py-4 muted-border order">

            <div class="row justify-content-between">
                <span class="order_time col-1">14:39</span>
                <span class="fillable table_id col-1 text-secondary" placeholder="table">21</span>
                <span class="order_dishes col-9 text-secondary">Rice Chips, Bear</span>
                <span class="col-1 other-info-arrow"><i class="fa-solid fa-angle-right"></i></span>
            </div>

            <div class="other-info py-3 col-19 row muted-border-top mt-2">

                <div class="row">
                    <div class="col-3">
                        <span class="customer_count fillable col-4" placeholder="number">5</span>
                        <span>Customers</span>
                    </div>
                    <div class="col-3">
                        <span>total price: </span>
                        <span class="total_price col-3">$500</span>
                    </div>
                </div>

                <div class="dishes-info my-4">

                    <div>
                        <p class="col-12">Dishes:</p>
                    </div>

                    <div class="dishes row">

                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-4" placeholder="quantity">3</span>
                                <span class="dish_name fillable mx-1 col-4" placeholder="Dish">Rice</span>
                                <span class="dish_total_price">$100</span>
                            </div>
                        </div>
                        
                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-3" placeholder="quantity">4</span>
                                    {{-- <select name="dish_id" id="" class="dash_name fillable col-3 d-inline"">
                                        <option value="1">Bear</option>
                                        <option value="2">Fries</option>
                                        <option value="3">Chicken</option>
                                        <option value="4">Rice</option>
                                    </select> --}}
                                <span class="dish_name enum-fillable mx-1 col-4" placeholder="Dish">Bear</span>
                                <span class="dish_total_price col-3">$200</span>
                            </div>
                        </div>

                    </div>

                </div>
                
                <div>
                    <button class="btn btn-dark delete-btn">Delete</button>
                    <button class="btn btn-dark update-btn">Update</button>
                    <button class="btn btn-dark d-none save-btn">Save</button>
                    <button class="btn btn-dark d-none cancel-btn">Canel</button>
                </div>

            </div>

        </li>
        <li class="py-4 muted-border order">

            <div class="row justify-content-between">
                <span class="order_time col-1">14:39</span>
                <span class="fillable table_id col-1 text-secondary" placeholder="table">21</span>
                <span class="order_dishes col-9 text-secondary">Rice Chips, Bear</span>
                <span class="col-1 other-info-arrow"><i class="fa-solid fa-angle-right"></i></span>
            </div>

            <div class="other-info py-3 col-19 row muted-border-top mt-2">

                <div class="row">
                    <div class="col-3">
                        <span class="customer_count fillable col-4" placeholder="number">5</span>
                        <span>Customers</span>
                    </div>
                    <div class="col-3">
                        <span>total price: </span>
                        <span class="total_price col-3">$500</span>
                    </div>
                </div>

                <div class="dishes-info my-4">

                    <div>
                        <p class="col-12">Dishes:</p>
                    </div>

                    <div class="dishes row">

                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-4" placeholder="quantity">3</span>
                                <span class="dish_name fillable mx-1 col-4" placeholder="Dish">Rice</span>
                                <span class="dish_total_price">$100</span>
                            </div>
                        </div>
                        
                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-3" placeholder="quantity">4</span>
                                    {{-- <select name="dish_id" id="" class="dash_name fillable col-3 d-inline"">
                                        <option value="1">Bear</option>
                                        <option value="2">Fries</option>
                                        <option value="3">Chicken</option>
                                        <option value="4">Rice</option>
                                    </select> --}}
                                <span class="dish_name enum-fillable mx-1 col-4" placeholder="Dish">Bear</span>
                                <span class="dish_total_price col-3">$200</span>
                            </div>
                        </div>

                    </div>

                </div>
                
                <div>
                    <button class="btn btn-dark delete-btn">Delete</button>
                    <button class="btn btn-dark update-btn">Update</button>
                    <button class="btn btn-dark d-none save-btn">Save</button>
                    <button class="btn btn-dark d-none cancel-btn">Canel</button>
                </div>

            </div>

        </li>
        <li class="py-4 muted-border order">

            <div class="row justify-content-between">
                <span class="order_time col-1">14:39</span>
                <span class="fillable table_id col-1 text-secondary" placeholder="table">21</span>
                <span class="order_dishes col-9 text-secondary">Rice Chips, Bear</span>
                <span class="col-1 other-info-arrow"><i class="fa-solid fa-angle-right"></i></span>
            </div>

            <div class="other-info py-3 col-19 row muted-border-top mt-2">

                <div class="row">
                    <div class="col-3">
                        <span class="customer_count fillable col-4" placeholder="number">5</span>
                        <span>Customers</span>
                    </div>
                    <div class="col-3">
                        <span>total price: </span>
                        <span class="total_price col-3">$500</span>
                    </div>
                </div>

                <div class="dishes-info my-4">

                    <div>
                        <p class="col-12">Dishes:</p>
                    </div>

                    <div class="dishes row">

                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-4" placeholder="quantity">3</span>
                                <span class="dish_name fillable mx-1 col-4" placeholder="Dish">Rice</span>
                                <span class="dish_total_price">$100</span>
                            </div>
                        </div>
                        
                        <div class="dish col-4 my-1">
                            <div class="dish_info d-inline">
                                <span class="dish_count fillable col-3" placeholder="quantity">4</span>
                                    {{-- <select name="dish_id" id="" class="dash_name fillable col-3 d-inline"">
                                        <option value="1">Bear</option>
                                        <option value="2">Fries</option>
                                        <option value="3">Chicken</option>
                                        <option value="4">Rice</option>
                                    </select> --}}
                                <span class="dish_name enum-fillable mx-1 col-4" placeholder="Dish">Bear</span>
                                <span class="dish_total_price col-3">$200</span>
                            </div>
                        </div>

                    </div>

                </div>
                
                <div>
                    <button class="btn btn-dark delete-btn">Delete</button>
                    <button class="btn btn-dark update-btn">Update</button>
                    <button class="btn btn-dark d-none save-btn">Save</button>
                    <button class="btn btn-dark d-none cancel-btn">Canel</button>
                </div>

            </div>

        </li>
        

    </ul>
    <script src="{{asset('js/dashboard.js')}}"></script>
@endsection