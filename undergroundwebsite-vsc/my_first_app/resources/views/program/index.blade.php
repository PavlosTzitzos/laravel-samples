@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Program of the week') }}</div>
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
                            <div class="p-2"><a href="{{route('program.create')}}"id="program-create" name="producer-create" class="btn btn-primary">Create New Program Slot</a></div>
                            <div class="p-2"><a href="{{route('program.clear')}}"id="producer-clear" name="producer-clear" class="btn btn-danger">Clear the program of the week</a></div>
                        </div>
                    @endcan
                    @can('isEditor')
                        <div class="d-flex justify-content-around">
                            <div class="p-2"><a href="{{route('program.create')}}"id="program-create" name="producer-create" class="btn btn-primary">Create New Program Slot</a></div>
                            <div class="p-2"><a href="{{route('program.clear')}}"id="producer-clear" name="producer-clear" class="btn btn-danger">Clear the program of the week</a></div>
                        </div>
                    @endcan
                @endif
                <div>
                    <table class="table">
                        <tr>
                            <th>Week Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Show Name</th>
                            @if (auth()->check())    
                                @can('isAdmin')
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endcan
                                @can('isEditor')
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endcan
                            @endif
                        </tr>
                        @foreach($programs as $program)
                        <tr>
                            <th>{{$program->program_weekday}}</th>
                            <th>{{$program->show_start_time}}</th>
                            <th>{{$program->show_end_time}}</th>
                            <th>{{$program->show->show_name}}</th>
                            @if (auth()->check())    
                                @can('isAdmin')
                                    <th>
                                        <a href="{{route('program.edit',['program'=> $program])}}">Edit</a>
                                    </th>
                                    <th>
                                        <a href="{{route('program.delete',['program'=> $program])}}">Delete</a>
                                    </th>
                                @endcan
                                @can('isEditor')
                                <th>
                                    <a href="{{route('program.edit',['program'=> $program])}}">Edit</a>
                                </th>
                                <th>
                                    <a href="{{route('program.delete',['program'=> $program])}}">Delete</a>
                                </th>
                                @endcan
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
