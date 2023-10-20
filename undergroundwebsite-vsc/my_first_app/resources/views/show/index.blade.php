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
                            @auth
                            <th>Edit</th>
                            <th>Delete</th>
                            @endauth
                        </tr>
                        @foreach($shows as $show)
                        <tr>
                            <th>{{$show->show_name}}</th>
                            <th>{{$show->show_description}}</th>
                            <th>{{$show->show_logo}}</th>
                            <th>
                            <!--@ foreach($show->producers as $producer)
                            { { $producer->first_name}}
                            @ endforeach
                            -->
                            </th>
                            <th>{{$show->program?$show->program->program_weekday:''}}</th>
                            @auth
                            <th>
                                <a href="{{route('show.edit',['show'=> $show])}}">Edit</a>
                            </th>
                            <th>
                                <a href="{{route('show.delete',['show'=> $show])}}">Delete</a>
                            </th>
                            @endauth
                        </tr>
                        @endforeach
                    </table>
                    <!--
                    Producers :
                    @ foreach($shows->producers as $producer)
                        <p>1. { {$producer->first_name}}</p>
                    @ endforeach
                    -->
                </div>
                @auth
                <div class="d-flex justify-content-around">
                    <a href="{{route('show.create')}}" id="show-create" name="show-create" class="btn btn-primary">Create New Show</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection