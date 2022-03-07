@extends('components.page-layout')
@section('header')
    <title>register</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection
@section('body')
    
<div class="register-container row h-100 m-0">
    <div class="register-offer col-md-5 col-sm-12 bg-black row align-items-center justify-content-center">
        <div class="restaurant-page h-50 text-white col-8">
            <h1 class="mb-5">Restaurant<br>register Page</h1>
            <p>register or register from here to access</p>
        </div>
    </div>
    <div class="register col-md-7 col-sm-12 row my-5 align-items-center">
        <div class="register-form-container px-5">
            <form action="" method="post" class="d-inline"> @csrf
                
                <div class="input-container">
                    <label for="name" class="font-weight-bold">User name</label>
                    @error('name')
                        <p style="color: #c90505">{{$message}}</p>
                    @enderror
                    <input type="text" name="name" id="name" placeholder="User name" class="d-block fillable">
                </div>

                <div class="input-container">
                    <label for="email" class="font-weight-bold">Email</label>
                    @error('email')
                        <p style="color: #c90505">{{$message}}</p>
                    @enderror
                    <input type="text" name="email" id="email" placeholder="Email" class="d-block fillable">
                </div>

                <div class="input-container">
                    <label for="password" class="font-weight-bold">Password</label>
                    @error('password')
                        <p style="color: #c90505">{{$message}}</p>
                    @enderror
                    <input type="password" name="password" id="password" placeholder="Password" class="d-block fillable">
                </div>

                <div class="input-container">
                    <label for="password_confirmation" class="font-weight-bold">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="d-block fillable">
                </div>

                <input type="submit" value="register" class="btn btn-dark">
                
            </form>
            <a href="{{url('login')}}"> <button class="btn btn-dark">Login</button> </a>
        </div>
    </div>
</div>

@endsection