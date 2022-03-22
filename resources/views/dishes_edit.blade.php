@extends('dashboard-layout')
@section('resource-dashboard')

<ul>

    @foreach ($errors->all() as $error)
    
        <li>{{$error}}</li>
    @endforeach
</ul>

    <div class="list p-2">

        <div class="items">

            <div class="item border-bottom py-3">
                <form action="{{url('dishes/'. $dish->id)}}" method="post" class="add-item m-0 p-0">
                    
                    @csrf
                    @method('put')

                    <div class="row justify-content-between">
                        <div class="col">
                            <input type="text" class="col-3 p-2" name="name" placeholder="Dish Name" value="{{$dish->name}}">
                            <input type="text" class="col-3 p-2" name="price" placeholder="Dish Price" value="{{$dish->price}}">
                        </div>
                        <input type="submit" class=" col-2 p-2 btn btn-dark" value="update">
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection