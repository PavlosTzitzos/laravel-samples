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
