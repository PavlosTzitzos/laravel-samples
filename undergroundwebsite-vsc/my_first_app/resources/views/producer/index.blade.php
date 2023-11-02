@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Producers') }}</div>
                <div>
                    @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                    @endif
                </div>
                @if (auth()->check()) 
                    @can('isAdmin')
                        <div class="d-flex justify-content-around">
                            <a href="{{route('producer.create')}}" id="producer-create" name="producer-create" class="btn btn-primary">Create New Producer</a>
                        </div>
                    @endcan
                @endif
                <div>
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Last Name</th>
                            <th>Description</th>
                            <th>Photo</th>
                            @if (auth()->check()) 
                                @can('isAdmin')
                                    <th>Phone Number</th>
                                    <th>E-mail</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endcan
                            @endif
                            <th>Details</th>
                        </tr>
                        
                        @foreach($producers as $producer)
                        <tr>
                            <th>{{$producer->first_name}}</th>
                            <th>{{$producer->second_name}}</th>
                            <th>{{$producer->last_name}}</th>
                            <th>{{$producer->description}}</th>
                            <th>{{$producer->photo}}</th>
                            @if (auth()->check()) 
                                @can('isAdmin')
                                    <th>{{$producer->phone_number}}</th>
                                    <th>{{$producer->email}}</th>
                                    <th>
                                        <a href="{{route('producer.edit',['producer'=> $producer])}}">Edit</a>
                                    </th>
                                    <th>
                                        <a href="{{route('producer.delete',['producer'=> $producer])}}">Delete</a>
                                    </th>
                                @endcan
                            @endif
                            <th>
                                <a href="{{route('producer.show',['producer'=> $producer])}}">Details</a>
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
