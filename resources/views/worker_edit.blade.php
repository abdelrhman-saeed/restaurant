@extends('dashboard-layout')
@section('resource-dashboard')

    <div class="list p-2">

        <div class="items">

            <div class="item border-bottom py-3">
                <form action="{{url('workers/'. $worker->id)}}" method="post" class="add-item m-0 p-0">

                    @csrf
                    @method('put')

                    <div class="row justify-content-between">
                        <div class="col-9 row">

                            <div class="col-12 row justify-content-between my-2">

                                <div class="col-6 row">
                                    @error('name')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="name" placeholder="name" value="{{$worker->name}}">
                                </div>

                                <div class="col-6 row">
                                    @error('role')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="role" placeholder="role" value="{{$worker->role}}">
                                </div>

                            </div>

                            <div class="col-12 row justify-content-between my-2">
                                <div class="col-6 row">
                                    @error('phone')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="phone" placeholder="phone" value="{{$worker->phone}}">
                                </div>
                                <div class="col-6 row">
                                    @error('email')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" class="p-2" name="email" placeholder="email" value="{{$worker->email}}">
                                </div>
                            </div>
                            
                            <div class="col-12 row justify-content-between my-2">
                                <div class="col-6 row">
                                    @error('salary')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text"name="salary" class="p-2" placeholder="salary" value="{{$worker->salary}}">
                                </div>
                                <div class="col-6 row">
                                    @error('address')
                                        <p>{{$message}}</p>
                                    @enderror
                                    <input type="text" name="address" class="p-2" placeholder="address" value="{{$worker->address}}">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class=" col-2 p-2 btn btn-dark" value="add">
                    </div>
                </form>
            </div>

            

        </div>

    </div>

@endsection