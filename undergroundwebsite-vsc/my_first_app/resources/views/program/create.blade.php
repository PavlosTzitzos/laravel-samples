@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Program Slot') }}</div>
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
                <form method="post" action="{{route('program.store')}}">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                        <label for="program_weekday" class="col-sm-2 col-form-label">Week Day : </label>
                        <div class="col-sm-10">
                            <select name="program_weekday" id="program_weekday" class="form-control">
                                <option value="">--Please choose an option--</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_start_time" class="col-sm-2 col-form-label"> Start Time </label>
                        <div class="col-sm-10">
                            <input type="time" name="show_start_time" id="show_start_time" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_end_time" class="col-sm-2 col-form-label"> End Time </label>
                        <div class="col-sm-10">
                            <input type="time" name="show_end_time" id="show_end_time" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_id" class="col-sm-2 col-form-label">Show Name : </label>
                        <div class="col-sm-10">
                            <select name="show_id" id="show_id" class="form-control">
                                <option value="">--Please choose an option--</option>
                                @foreach($shows as $show)
                                    <option value="{{$show->id}}">{{$show->show_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Save Slot</button></div>
                        <div class="p-2"><a href="{{route('program.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
