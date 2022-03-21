@extends('components.page-layout')
@section('header')
    <title>Restaurant Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Smooch+Sans:wght@500&display=swap" rel="stylesheet"> --}}
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

    <meta name="csrf_token" content="{{csrf_token()}}">

@endsection

@section('body')
    
    <div class="dashboard-container h-100">
        <div class="dashboard row h-100 m-0">

            <div class="dashboard-list bg-muted col-2 position-relative top-0 h-100 m-0">
                <div class="components bg-muted h-100 px-3 position-fixed">

                    <div class="list-component my-3 user row align-items-center py-3 muted-border">
                        <h6 class="user-name col-12">Abdelrhman</h6>
                        <p class="text-secondary user-role col-12">developer</p>
                    </div>

                    <div class="list-component dashboard-resources h-75">
                        <p class="text-secondary mb-4">Management</p>

                        <div class="list-items text-secondary">
                            <ul class="p-0">

                                <li class="my-4">
                                    <i class="fa-solid fa-utensils"></i>
                                    <a href="{{url('dashboard')}}" class="text-decoration-none link-secondary">
                                        <span class="mx-2">Orders</span>
                                    </a>
                                </li>
                                
                                <li class="my-4">
                                    <i class="fa-brands fa-elementor"></i>
                                    <a href="{{url('dishes')}}" class="text-decoration-none link-secondary">
                                        <span class="mx-2">Dishes</span>
                                    </a>
                                </li>

                                <li class="my-4">
                                    <i class="fa-solid fa-user"></i>
                                    <a href="{{url('workers')}}" class="text-decoration-none link-secondary"">
                                        <span class="mx-2">Employees</span>
                                    </a>
                                </li>

                                <li class="my-4">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                    <a href="{{url('resources')}}" class="text-decoration-none link-secondary">
                                        <span class="mx-2">Inventory</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="dashboard-main-content col-7 border border-bottom border-top px-5 pt-4">

                <div class="list-item-header row justify-content-between">
                    <h1 class="col font-weight-bold">Dashboard</h1>
                    {{-- <button class="btn btn-dark col-2 font-weight-bold">New Order</button> --}}
                </div>

                <div class="customers-action-counting my-5 row font-weight-bold justify-content-between">

                    <div class="customers-counting fl-muted-border rounded row col-5 px-3 py-4">
                        <div class="restaurant-card customer-count-today col">
                            <h6 class="text-secondary">Visitors today</h6>

                            <p>
                                <span class="h1">{{$visitorsByToday}}</span>
                            </p>
                        </div>
                        <div class="restaurant-card income-for-today col">
                            <h6 class="text-secondary">Today's income</h6>
                            <p class="h1">${{$incomeByToday}}</p>
                        </div>
                    </div>

                    <div class="best-items fl-muted-border rounded col-4 px-3 py-4">
                        <div class="restaurant-card">
                            <h6 class="text-secondary">Best Selling Dishes</h6>
                            <ul class="p-0">
                                @foreach ($bestDishes as $bestDish)
                                    
                                    <li class="my-3 row justify-content-center">
                                        <span class="col">{{$bestDish->name}}</span>
                                        <span class="col-4">${{$bestDish->price}}</span>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="resource-dashboard">
                    @yield('resource-dashboard')
                </div>

            </div>

            <div class="dashboard-income col-3 p-4 position-relative h-100 m-0">
                <div class="position-fixed col-2">
                    
                    <div class="totals row my-3">
                        <div class="total-income col">
                            <p>Total Income</p>
                            <h3>${{$totalIncome}}</h3>
                        </div>
                        
                        <div class="total-orders col">
                            <p>Total Orders</p>
                            <h3>{{$totalOrders}}</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection