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
                                <input type="text" name="name" placeholder="Resource name" value="{{$resource->name}}">
                            </div>
                            <div class="col-4 row">
                                @error('price')
                                    <p> {{$message}} </p>
                                @enderror
                                <input type="text" name="price" placeholder="Resource price" value="{{$resource->price}}">
                            </div>

                            <div class="col-4 row">
                                @error('quantity')
                                    <p> {{$message}} </p>
                                @enderror
                                <input type="text" name="quantity" placeholder="Resource quantity" value="{{$resource->quantity}}">
                            </div>
                        </div>
                        <input type="submit" class=" col-2 p-2 btn btn-dark" value="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection