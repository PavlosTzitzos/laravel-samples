@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete a Show') }}</div>
                <form method="post" action="{{route('show.destroy',['show'=>$show])}}" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="form-group row">
                        <label for="show_name" class="col-sm-2 col-form-label"> Show Name : </label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" name="show_name" id="show_name"placeholder="Underground Playlist" value="{{$show->show_name}}" aria-describedby="show_name_help" disabled/>
                            <small id="show_name_help" class="form-text text-muted">
                                The name of the show can have any letter, number, symbol and emoji.
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_description" class="col-sm-2 col-form-label">Description :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="show_description" placeholder="optional description" value="{{$show->show_description}}" disabled></textarea>
                        </div>
                    </div>
                    <div class="form-group-file row">
                        <label for="show_logo" class="col-sm-2 col-form-label"> Show Logo : </label>
                        <div class="col-sm-10">
                            <input type="file" name="show_logo" id="show_logo" class="form-control-file" disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dynamic-form" class="col-sm-2 col-form-label"> Producers : </label>
                        <div id="dynamic-form " class="col-sm-6 inp-group">
                            @foreach($show->producers as $producer)
                                <input name="{{$producer->id}}" id="{{$producer->id}}" value="{{$producer->first_name}} {{$producer->second_name?$producer->second_name:''}} {{$producer->last_name}}" disabled> <br>
                            @endforeach
                        </div>
                        <button type="button" id="add-producer" class="btn btn-success add" disabled>&plus; Add Producer</button>
                    </div>
                    <!--
                    <div class="form-group row">
                        <label for="producer_ids" class="col-sm-2 col-form-label">Producers : </label>
                        <div class="col-sm-10">
                            <select name="producers_in_show" id="producer_id" class="form-control">
                                <option value="">--Please choose an option--</option>
                                @ foreach($ producers as $ producer)
                                    <option value="{ { $ producer->id}}">{ { $ producer->first_name}} { { $ producer->last_name}}</option>
                                @ endforeach
                            </select>
                        </div>
                    </div>-->
                    <div class="d-flex justify-content-around">
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-danger">Confirm Delete Show</button></div>
                        <div class="p-2"><a href="{{route('show.index')}}" id="cancel" name="cancel" class="btn btn-primary">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
