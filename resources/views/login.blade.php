@extends('components.page-layout')
@section('header')
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('body')
    
<div class="login-container row h-100 m-0">
    <div class="login-offer col-md-5 col-sm-12 m-0 bg-black row align-items-center justify-content-center">
        <div class="restaurant-page text-white col-8">
            <h1 class="mb-5">Restaurant<br>Login Page</h1>
            <p>login or register from here to access</p>
        </div>
    </div>
    <div class="login col-md-7 col-sm-12 my-3 row align-items-center px-5">
        <div class="login-form-container">
            <form action="" method="post" class="d-inline"> @csrf
                <div class="input-container">
                    @error('name')
                        <p style="color: #c90505">{{$message}}</p>
                    @enderror
                    <label for="name" class="font-weight-bold">User name</label>
                    <input type="text" name="name" id="name" placeholder="User name" class="d-block fillable">
                </div>
                <div class="input-container">
                    @error('password')
                        <p style="color: #c90505">{{$message}}</p>
                    @enderror
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="d-block fillable">
                </div>
                <div class="input-container my-4">
                    <input type="checkbox" class="mx-2" name="remember_me"> Remember me
                </div>
                <input type="submit" value="Login" class="btn btn-dark">
            </form>
            <a href="{{url('/users/create')}}" class="d-inline">
                <button class="btn btn-dark">Register</button>
            </a>

            <div class="my-3" style="color: #c90505">
                @error('unauthorized')
                {{$message}}
                @enderror
            </div>
        </div>
    </div>
</div>

@endsection