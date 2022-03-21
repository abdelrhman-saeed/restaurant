@extends('dashboard-layout')
@section('resource-dashboard')

    <div class="list p-2">

        <div class="items">

            <div class="item border-bottom py-3">
                <form action="{{url('resources')}}" method="post" class="add-item m-0 p-0">

                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-8 row justify-content-between">
                            <div class="col-4 row">
                                @error('name')
                                    <p> {{$message}} </p>
                                @enderror
                                <input type="text" name="name" placeholder="Resource name">
                            </div>
                            <div class="col-4 row">
                                @error('price')
                                    <p> {{$message}} </p>
                                @enderror
                                <input type="text" name="price" placeholder="Resource price">
                            </div>

                            <div class="col-4 row">
                                @error('quantity')
                                    <p> {{$message}} </p>
                                @enderror
                                <input type="text" name="quantity" placeholder="Resource quantity">
                            </div>
                        </div>
                        <input type="submit" class=" col-2 p-2 btn btn-dark" value="add">
                    </div>
                </form>
            </div>

            @foreach ($resources as $resource)

                <div class="item border-bottom py-3 row align-items-center">
                    <form action="{{url('resources/'. $resource->id)}}" method="post">
                        @csrf
                        @method('delete')

                        <div class="row justify-content-between">
                            <div class="col row justify-content-start">
                                <span name="name" class="col-3 p-2">{{$resource->name}}</span>
                                <span name="price" class="col-3 p-2">{{$resource->price}}</span>
                                <span name="quantity" class="col-3 p-2">{{$resource->quantity}}</span>
                            </div>

                        <input type="Submit" class="col-2 mx-1 p-2 btn btn-dark" value="Delete">

                    </form>
                    <a href="{{url('resources/'. $resource->id .'/edit')}}" class=" col-2 mx-1 p-2 btn btn-dark">Update</a>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection