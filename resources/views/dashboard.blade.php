@extends('dashboard-layout')
@section('resource-dashboard')

    <script>
        
        var dishes =  <?php echo json_encode($dishes); ?>;
    </script>
    
    <ul class="orders_info py-2 p-0 m-0">

        <select name="dish_id" id="" class="dish_id d-none enum-fillable col-4 mx-2 d-inline"">
            @foreach ($dishes as $dish)
                <option value="{{$dish->id}}">{{$dish->name}}</option>
            @endforeach
        </select>        

        <li class="py-4 muted-border row justify-content-between align-items-center">
            <span class="order_time col-3">Time</span>
            <span class="order_table_id col-7 text-secondary">Table number</span>
            <button class="btn btn-dark new-order-btn col-2 p-3"> New Order </button>
        </li>

        {{--  form instance --}}
        <li class="py-4 muted-border order order-form-instance d-none">

            <form action="{{url('orders')}}" method="POST" class="needs-validation order-data"> @csrf
                
                <div class="row justify-content-between">
                    <span class="order_time col-1">{{now()->format('h:i')}}</span>
                    <input type="text" name="table_id" class="fillable table_id col-1 text-secondary" placeholder="table" required>
                    <span class="order_dishes col-9 text-secondary">Dishes</span>
                    <span class="col-1 other-info-arrow"><i class="fa-solid fa-angle-right"></i></span>
                </div>

                <div class="other-info py-3 col-19 row muted-border-top mt-2">

                    <div class="row">
                        <div class="col-3">
                            <input type="text" name="customer_count" class="customer_count fillable col-4" placeholder="Num" required>
                            <span>Customers</span>
                        </div>
                        <div class="col-3">
                            <span>total price: </span>
                            <span class="total_price col-3">$0</span>
                        </div>

                        <div class="col-3 add_dish_btn_container">
                            <button class="add_dish btn btn-dark">add Dish</button>
                        </div>
                    </div>

                    <div class="dishes-info my-4">

                        <div>
                            <p class="col-12">Dishes:</p>
                        </div>

                        <div class="dishes row">
            
                            <div class="dish border rounded p-3 col-4">
                                <div class="dish_info d-inline">
                                    <input type="text" name="dish_count" class="dish_count fillable col-4" placeholder="Count" required>
                                    <select name="dish_id" id="" class="dish_id enum-fillable col-4 mx-2 p-1 d-inline">
                                        @foreach ($dishes as $dish)
                                            <option value="{{$dish->id}}">{{$dish->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="dish_total_price col-4 mx-1">$0</span>
                                    <i class="fa-solid fa-circle-xmark remove-dish"></i>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                    <div class="create_btn_container">
                        <input type="submit" value="Create" class="btn btn-dark create-btn">
                    </div>
                    <div class="order_actions d-none">
                        <div class="update-delete-buttons">
                            <button class="btn btn-dark delete-btn">Delete</button>
                            <button class="btn btn-dark update-btn">Update</button>
                        </div>
                        <div class="d-none cancel-save-buttons">
                            <button class="btn btn-dark save-btn">Save</button>
                            <button class="btn btn-dark cancel-btn">Canel</button>
                        </div>
                    </div>

                </div>
            </form>

        </li>
        {{--  form instance --}}

        @foreach($orders as $order)
            <li id="{{$order->id}}" class="order-info py-4 muted-border order">

                <div class="row justify-content-between">
                    <div class="row col-10">
                        <span class="order-number col-3">Order - {{$order->id}}</span>
                        <span class="order_time col-3">{{now()->create($order->created_at)->format('m:d / h:i A')}}</span>
                        <span class="fillable table_id col-1 text-secondary" name="table_id" placeholder="table">{{$order->table_id}}</span>
                    </div>
                    
                    <span class="col-1 other-info-arrow"><i class="fa-solid fa-angle-right"></i></span>
                </div>

                <div class="other-info py-3 col-19 row muted-border-top mt-2">

                    <div class="row">
                        <div class="col-3">
                            <span class="customer_count fillable col-4" name="customer_count" placeholder="number">{{$order->customer_count}}</span>
                            <span>Customers</span>
                        </div>
                        <div class="col-3">
                            <span>total price: </span>
                            <span class="total_price col-3">${{$order->total_price}}</span>
                        </div>
                        <div class="col-3 add_dish_btn_container d-none">
                            <button class="add_dish btn btn-dark">add Dish</button>
                        </div>
                    </div>

                    <div class="dishes-info my-4">

                        <div>
                            <p class="col-12">Dishes:</p>
                        </div>

                        <div class="dishes row justify-content-between">

                            @foreach($order->dishes as $dish)
                                <div class="dish col-5 mb-3">
                                    <div class="dish_info border rounded p-3 row justify-content-around align-items-center">
                                        <span class="dish_count border-right fillable col-3" name="dish_count" placeholder="count">{{$dish->pivot->dish_count}}</span>
                                        <span name="dish_id" value="{{$dish->id}}" class="dish_id enum-fillable col-4 mx-2 d-inline" placeholder="Dish">{{$dish->name}}</span>
                                        <span class="dish_total_price col-3">${{$dish->pivot->dish_count * $dish->price}}</span>
                                        <i class="fa-solid col-1 fa-circle-xmark remove-dish d-none"></i>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    
                    <div class="order_actions">
                        <div class="update-delete-buttons">
                            <button class="btn btn-dark delete-btn">Delete</button>
                            <button class="btn btn-dark update-btn">Update</button>
                        </div>
                        <div class="d-none cancel-save-buttons">
                            <button class="btn btn-dark save-btn">Save</button>
                            <button class="btn btn-dark cancel-btn">Canel</button>
                        </div>
                    </div>

                </div>

            </li>
        @endforeach

    </ul>
    <script src="{{asset('js/dashboard.js')}}"></script>
@endsection