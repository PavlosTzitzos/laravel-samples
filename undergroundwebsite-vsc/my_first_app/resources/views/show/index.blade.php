<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Show</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    @auth
    <div>
        <a href="{{route('show.create')}}">Create New Show</a>
    </div>
    @endauth
    <div>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Logo</th>
                @auth
                <th>Edit</th>
                <th>Delete</th>
                @endauth
            </tr>
            @foreach($shows as $show)
            <tr>
                <th>{{$show->show_name}}</th>
                <th>{{$show->show_description}}</th>
                <th>{{$show->show_logo}}</th>
                @auth
                <th>
                    <a href="{{route('show.edit',['show'=> $show])}}">Edit</a>
                </th>
                <th>
                    <a href="{{route('show.delete',['show'=> $show])}}">Delete</a>
                </th>
                @endauth
            </tr>
            @endforeach
        </table>
    </form>
</body>
</html>