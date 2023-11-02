@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Shows') }}</div>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Logo</th>
                            <th>Producers</th>
                            <th>Time</th>
                        </tr>
                        @foreach($shows as $show)
                        <tr>
                            <th>{{$show->show_name}}</th>
                            <th>{{$show->show_description}}</th>
                            <th>
                                <img src="{{ url('public/showlogos/'.$show->show_logo) }}" style="height: 100px; width: 150px;">
                            </th>
                            <th>
                            @foreach($show->producers as $producer)
                                {{$producer->first_name}} {{$producer->second_name?$producer->second_name:''}} {{$producer->last_name}}
                                <br>
                            @endforeach
                            
                            </th>
                            <th>{{$show->program?$show->program->program_weekday:''}}</th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection