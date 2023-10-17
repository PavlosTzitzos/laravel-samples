<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Delete a Show</h1>
    <form method="post" action="{{route('show.destroy',['show'=>$show])}}">
        @csrf
        @method('delete')
        <div>
            <label> Show Name </label>
            <input type="name" name="show_name" placeholder="Underground Playlist" value="{{$show->show_name}}" disabled/>
        </div>
        <div>
            <label> Show Description (optional) </label>
            <input type="name" name="show_description" placeholder="Songs from all underground producer" value="{{$show->show_description}}" disabled/>
        </div>
        <div>
            <label> Show Logo (optional - accepts only image filetype) </label>
            <input type="file" name="show_logo" value="{{$show->show_logo}}" disabled/>
        </div>
        <div>
            Assign producers
        </div>
        <div>
            <input type="submit" value="Confirm Delete Show"/>
        </div>
    </form>
</body>
</html>