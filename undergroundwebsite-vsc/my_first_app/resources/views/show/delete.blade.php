@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete a Show') }}</div>
                <form method="post" action="{{route('show.destroy',['show'=>$show])}}">
                    @csrf
                    @method('delete')
                    <div>
                        <label> Show Name </label>
                        <input type="name" name="show_name" placeholder="Underground Playlist" value="{{$show->show_name}}" disabled/>
                    </div>
                    <div>
                        <label> Show Description </label>
                        <input type="text" name="show_description" placeholder="optional" value="{{$show->show_description}}" disabled/>
                    </div>
                    <div>
                        <label> Show Logo (optional - accepts only image filetype) </label>
                        <input type="file" name="show_logo" value="{{$show->show_logo}}" disabled/>
                    </div>
                    <div>
                        Assign producers
                    </div>
                    <div class="col-md-8">
                        <button id="submit" name="submit" class="btn btn-danger">Confirm Delete Show</button>
                        <a href="{{route('show.index')}}" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
