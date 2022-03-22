@extends('dashboard-layout')
@section('resource-dashboard')

    <div class="list p-2">

        <div class="items">

            <div class="item border-bottom py-3">
                <form action="{{url('workers')}}" method="post" class="add-item m-0 p-0">

                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-9 row">

                            <div class="col-12 row justify-content-between my-2">

                                <div class="col-6 row">
                                    @error('name')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="name" placeholder="name">
                                </div>

                                <div class="col-6 row">
                                    @error('role')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="role" placeholder="role">
                                </div>

                            </div>

                            <div class="col-12 row justify-content-between my-2">
                                <div class="col-6 row">
                                    @error('phone')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="phone" placeholder="phone">
                                </div>
                                <div class="col-6 row">
                                    @error('email')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="email" placeholder="email">
                                </div>
                            </div>
                            
                            <div class="col-12 row justify-content-between my-2">
                                <div class="col-6 row">
                                    @error('salary')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text"name="salary" class="p-2" placeholder="salary">
                                </div>
                                <div class="col-6 row">
                                    @error('address')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" name="address" class="p-2" placeholder="address">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class=" col-2 p-2 btn btn-dark" value="add">
                    </div>
                </form>
            </div>

            @foreach ($workers as $worker)

                <div class="item border-bottom py-3 row align-items-center">
                    <form action="{{url('workers/'. $worker->id)}}" method="post" class="my-2">
                        @csrf
                        @method('delete')

                        <div class="row justify-content-between">
                            <div class="col-12 row justify-content-between">
                                <span name="name" class="col-3 p-2">
                                    <span class="text-secondary">name |</span>
                                    <span>{{$worker->name}}</span>
                                </span>
                                <span name="price" class="col-3 p-2">
                                    <span class="text-secondary">role |</span>
                                    <span>{{$worker->role}}</span>
                                </span>
                                <span name="price" class="col-3 p-2">
                                    <span class="text-secondary">phone |</span>
                                    <span>{{$worker->phone}}</span>
                                </span>
                            </div>

                            <div class="col-12 row justify-content-between">
                                <span name="name" class="col-8 p-2">
                                    <span class="text-secondary">emal |</span>
                                    <span>{{$worker->email}}</span>
                                </span>
                                <span name="price" class="col-3 p-2">
                                    <span class="text-secondary">salary |</span>
                                    <span>{{$worker->salary}}</span>
                                </span>
                            </div>
                            <span name="price" class="col-12 p-2">
                                <span class="text-secondary">address |</span>
                                <span>{{$worker->address}}</span>
                            </span>

                            
                        </form>
                        <div class="row my-5">
                            <input type="Submit" class="col-2 mx-1 p-2 btn btn-dark" value="Delete">
                            <a href="{{url('workers/'. $worker->id .'/edit')}}" class=" col-2 mx-1 p-2 btn btn-dark">Update</a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection