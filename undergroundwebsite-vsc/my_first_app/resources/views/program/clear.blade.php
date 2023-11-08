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
                <form id="form" method="post" action="{{route('program.empty')}}">
                    @csrf
                    @method('delete')
                    @if (auth()->check()) 
                        @can('isAdmin')
                            <div class="d-flex justify-content-around">
                                <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Confirm Delete All</button></div>
                                <div class="p-2"><a href="{{route('program.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                            </div>
                        @endcan
                        @can('isEditor')
                            <div class="d-flex justify-content-around">
                                <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Confirm Delete All</button></div>
                                <div class="p-2"><a href="{{route('program.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                            </div>
                        @endcan
                    @endif
                </form>
                <div>
                    <table class="table">
                        <tr>
                            <th>Week Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Show Name</th>
                        </tr>
                        @foreach($programs as $program)
                        <tr>
                            <th>{{$program->program_weekday}}</th>
                            <th>{{$program->show_start_time}}</th>
                            <th>{{$program->show_end_time}}</th>
                            <th>{{$program->show->show_name}}</th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
