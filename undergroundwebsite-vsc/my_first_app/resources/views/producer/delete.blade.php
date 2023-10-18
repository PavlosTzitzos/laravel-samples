@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete Producer') }}</div>
                <form method="post" action="{{route('producer.destroy',['producer'=>$producer])}}">
                    @csrf
                    @method('delete')
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name </label>
                        <div class="col-sm-10">
                            <input type="name" name="first_name" id="first_name" placeholder="e.g. Christos"  value="{{$producer->first_name}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="second_name" class="col-sm-2 col-form-label">Second Name</label>
                        <div class="col-sm-10">
                            <input type="name" name="second_name" placeholder="e.g. Giannis (optional)"  value="{{$producer->second_name}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last Name </label>
                        <div class="col-sm-10">
                            <input type="name" name="last_name" id="second_name" placeholder="e.g. Papadopoulos" value="{{$producer->last_name}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-2 col-form-label">Phone Number </label>
                        <div class="col-sm-10">
                            <input type="number" name="phone_number" id="phone_number" placeholder="e.g. 6983729286" value="{{$producer->phone_number}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email </label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email"placeholder="e.g. example@example.com" value="{{$producer->email}}" disabled/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Confirm Delete</button></div>
                        <div class="p-2"><a href="{{route('producer.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
