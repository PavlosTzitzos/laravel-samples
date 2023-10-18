@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a Show') }}</div>
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
                <form method="post" action="{{route('show.update',['show'=>$show])}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="show_name" class="col-sm-2 col-form-label"> Show Name : </label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" name="show_name" id="show_name"placeholder="Underground Playlist" aria-describedby="show_name_help" value="{{$show->show_name}}"/>
                            <small id="show_name_help" class="form-text text-muted">
                                The name of the show can have any letter, number, symbol and emoji.
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_description" class="col-sm-2 col-form-label">Description :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="show_description" placeholder="optional description" value="{{$show->show_description}}"></textarea>
                        </div>
                    </div>
                    <div class="form-group-file row">
                        <label for="show_logo" class="col-sm-2 col-form-label"> Show Logo : </label>
                        <div class="col-sm-10">
                            <input type="file" name="show_logo" id="show_logo" class="form-control-file" value="{{$show->show_logo}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label"> Producers : </label>
                        <div id="dynamic-form" class="col-sm-6">
                            <!-- Input fields will be added/removed here -->
                        </div>
                        <button type="button" id="add-producer" class="btn btn-success" >Add Producer</button>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Update Show</button></div>
                        <div class="p-2"><a href="{{route('show.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                    </div>
                </form>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        var dynamicForm = $('#dynamic-form');
                        var addButton = $('#add-producer');

                        addButton.click(function() {
                            dynamicForm.append('<div class="row"><div class="col"><input type="name" class="form-control" name="producers[]"></div><div class="col"><button type="button" class="btn btn-danger">Remove Producer</button></div></div><br>');
                        });

                        dynamicForm.on('click', '.remove-producer', function() {
                            $(this).prev('input').remove();
                            $(this).remove();
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
