@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete a Program Slot') }}</div>
                <form method="post" action="{{route('program.destroy',['program'=>$program])}}">
                    @csrf
                    @method('delete')
                    <div class="form-group row">
                        <label for="program_weekday" class="col-sm-2 col-form-label">Week Day : </label>
                        <div class="col-sm-10">
                            <input type="text" name="program_weekday" id="program_weekday" value="{{$program->program_weekday}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_start_time" class="col-sm-2 col-form-label"> Start Time </label>
                        <div class="col-sm-10">
                            <input type="time" name="show_start_time" id="show_start_time" class="form-control" value="{{$program->show_start_time}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_end_time" class="col-sm-2 col-form-label"> End Time </label>
                        <div class="col-sm-10">
                            <input type="time" name="show_end_time" id="show_end_time" class="form-control"  value="{{$program->show_end_time}}" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_id" class="col-sm-2 col-form-label"> Show Name </label>
                        <div class="col-sm-10">
                            <input type="name" name="show_id" id="show_id" class="form-control" value="{{$program->show->show_name}}" disabled/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Confirm Delete</button></div>
                        <div class="p-2"><a href="{{route('program.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
