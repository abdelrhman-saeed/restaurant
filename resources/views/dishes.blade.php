@extends('dashboard-layout')
@section('resource-dashboard')

    <div class="list p-2">

        <div class="items">

            <div class="item border-bottom py-3">
                <form action="{{url('dishes')}}" method="post" class="add-item m-0 p-0">

                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-8 row justify-content-between">
                            <div class="col-5">
                                @error('name')
                                    <p> {{$message}} </p>
                                @enderror
                                <input type="text" name="name" placeholder="Dish Name">
                            </div>
                            <div class="col-5">
                                @error('price')
                                    <p> {{$message}} </p>
                                @enderror
                                <input type="text" name="price" placeholder="Dish Price">
                            </div>
                        </div>
                        <input type="submit" class=" col-2 p-2 btn btn-dark" value="add">
                    </div>
                </form>
            </div>

            @foreach ($dishes as $dish)

                <div class="item border-bottom py-3 row align-items-center">
                    <form action="{{url('dishes/'. $dish->id)}}" method="post">
                        @csrf
                        @method('delete')

                        <div class="row justify-content-between">
                            <div class="col row justify-content-start">
                                <span name="name" class="col-3 p-2">{{$dish->name}}</span>
                                <span name="price" class="col-3 p-2">{{$dish->price}}</span>
                            </div>

                        <input type="Submit" class="col-2 mx-1 p-2 btn btn-dark" value="Delete">

                    </form>
                    <a href="{{url('dishes/'. $dish->id .'/edit')}}" class=" col-2 mx-1 p-2 btn btn-dark">Update</a>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection