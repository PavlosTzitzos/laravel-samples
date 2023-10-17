<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Show</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($erros->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('show.update',['show'=>$show])}}">
        @csrf
        @method('put')
        <div>
            <label> Show Name </label>
            <input type="name" name="show_name" placeholder="Underground Playlist" value="{{$show->show_name}}"/>
        </div>
        <div>
            <label> Show Description (optional) </label>
            <input type="name" name="show_description" placeholder="Songs from all underground producer" value="{{$show->show_description}}"/>
        </div>
        <div>
            <label> Show Logo (optional - accepts only image filetype) </label>
            <input type="file" name="show_logo" value="{{$show->show_logo}}"/>
        </div>
        <div>
            Assign producers
        </div>
        <div>
            <input type="submit" value="Update show"/>
        </div>
    </form>
</body>
</html>