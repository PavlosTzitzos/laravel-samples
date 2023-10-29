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
                
                <div>
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Last Name</th>
                            <th>Description</th>
                            <th>Photo</th>
                        </tr>
                        
                        @foreach($producers as $producer)
                        <tr>
                            <th>{{$producer->first_name}}</th>
                            <th>{{$producer->second_name}}</th>
                            <th>{{$producer->last_name}}</th>
                            <th>{{$producer->description}}</th>
                            <th>{{$producer->photo}}</th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
