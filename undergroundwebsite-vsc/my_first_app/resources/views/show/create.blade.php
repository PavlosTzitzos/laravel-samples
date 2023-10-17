<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a New Show</h1>
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
    <form method="post" action="{{route('show.store')}}">
        @csrf
        @method('post')
        <div>
            <label> Show Name </label>
            <input type="name" name="show_name" placeholder="Underground Playlist"/>
        </div>
        <div>
            <label> Show Description (optional) </label>
            <input type="name" name="show_description" placeholder="Songs from all underground producer"/>
        </div>
        <div>
            <label> Show Logo (optional - accepts only image filetype) </label>
            <input type="file" name="show_logo"/>
        </div>
        <div>
            Assign producers
        </div>
        <div>
            <input type="submit" value="Save a new show"/>
        </div>
    </form>
</body>
</html>