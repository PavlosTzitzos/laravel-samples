@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Producer') }}</div>
                <div>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <form method="post" action="{{route('producer.update',['producer'=>$producer])}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name </label>
                        <div class="col-sm-10">
                            <input type="name" name="first_name" id="first_name" placeholder="e.g. Christos"  value="{{$producer->first_name}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="second_name" class="col-sm-2 col-form-label">Second Name</label>
                        <div class="col-sm-10">
                            <input type="name" name="second_name" placeholder="e.g. Giannis (optional)"  value="{{$producer->second_name}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last Name </label>
                        <div class="col-sm-10">
                            <input type="name" name="last_name" id="second_name" placeholder="e.g. Papadopoulos" value="{{$producer->last_name}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-2 col-form-label">Phone Number </label>
                        <div class="col-sm-10">
                            <input type="number" name="phone_number" id="phone_number" placeholder="e.g. 6983729286" value="{{$producer->phone_number}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email </label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email"placeholder="e.g. example@example.com" value="{{$producer->email}}"/>
                        </div>
                    </div>
                    <div class="form-group-file row">
                        <label for="producer_image" class="col-sm-2 col-form-label"> Producer image : </label>
                        <img src="{{ url('public/producerimage/'.$producer->producer_image) }}" style="height: 100px; width: 150px;">
                        <div class="col-sm-10">
                            <input type="file" name="producer_image" id="producer_image" class="form-control-file" value="{{$producer->producer_image}}"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Update</button></div>
                        <div class="p-2"><a href="{{route('producer.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
