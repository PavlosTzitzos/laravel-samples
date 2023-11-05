@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Now On Air Show !!') }}</div>
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
                <form method="post" action="{{route('home.update',['current_show'=>$current_show])}}">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="show_id" class="col-sm-2 col-form-label">Show Name : </label>
                        <div class="col-sm-10">
                            <select name="show_id" id="show_id" class="form-control">
                                <option value="">--Please choose an option--</option>
                                @foreach($shows as $show)
                                    <option value="{{$show->id}}" @if($current_show->show_id==$show->id)selected @endif >{{$show->show_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Save Slot</button></div>
                        <div class="p-2"><a href="{{route('home.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
