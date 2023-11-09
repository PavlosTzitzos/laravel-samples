@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Show') }} - Please make sure you have already created all the producers</div>
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
                <form method="post" action="{{route('show.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                        <label for="show_name" class="col-sm-2 col-form-label"> Show Name : </label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" name="show_name" id="show_name"placeholder="Underground Playlist" aria-describedby="show_name_help"/>
                            <small id="show_name_help" class="form-text text-muted">
                                The name of the show can have any letter, number, symbol and emoji.
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="show_description" class="col-sm-2 col-form-label">Description :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="show_description" id="show_description" placeholder="optional description"></textarea>
                        </div>
                    </div>
                    <div class="form-group-file row">
                        <label for="show_logo" class="col-sm-2 col-form-label"> Show Logo : </label>
                        <div class="col-sm-10">
                            <input type="file" name="show_logo" id="show_logo" class="form-control-file"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dynamic-form" class="col-sm-2 col-form-label"> Producers : </label>
                        <div id="dynamic-form " class="col-sm-6 inp-group">
                            <!-- Input fields will be added/removed here -->
                        </div>
                        <button type="button" id="add-producer" class="btn btn-success add" >&plus; Add Producer</button>
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
                        <div class="p-2"><button id="submit" name="submit" class="btn btn-primary">Save New Show</button></div>
                        <div class="p-2"><a href="{{route('show.index')}}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Dynamic Field Creation with javascript

    const addBtn = document.querySelector(".add");

    const input = document.querySelector(".inp-group");

    function removeInput(){
        this.parentElement.remove();
    }

    function addInput(){
        const producer = document.createElement("select");
        producer.className = "form-control col";
        producer.id = "producer_ids[]";
        producer.name = "producer_ids[]";

        @foreach($producers as $producer)
            var option_{{$producer->id}} = document.createElement("option");
            option_{{$producer->id}}.value = "{{ $producer->id }}";
            option_{{$producer->id}}.innerHTML = "{{$producer->first_name}} {{$producer->last_name}}";
            producer.appendChild(option_{{$producer->id}});
        @endforeach

        const btn = document.createElement("a");
        btn.className = "delete col btn btn-danger";
        btn.innerHTML = "&times Remove Producer";

        btn.addEventListener("click", removeInput);

        const flex = document.createElement("div");
        flex.className = "flex row";

        input.appendChild(flex);
        flex.appendChild(producer);
        flex.appendChild(btn);
    }
    addBtn.addEventListener("click", addInput);
</script>
@endsection
