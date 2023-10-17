<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Producer</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    @auth
    <div>
        <a href="{{route('producer.create')}}">Add New Producer</a>
    </div>
    @endauth
    <div>
        <table border="1">
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Last Name</th>
                @auth
                <th>Phone Number</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Delete</th>
                @endauth
            </tr>
            @foreach($producers as $producer)
            <tr>
                <th>{{$producer->first_name}}</th>
                <th>{{$producer->second_name}}</th>
                <th>{{$producer->last_name}}</th>
                @auth
                <th>{{$producer->phone_number}}</th>
                <th>{{$producer->email}}</th>
                <th>
                    <a href="{{route('producer.edit',['producer'=> $producer])}}">Edit</a>
                </th>
                <th>
                    <a href="{{route('producer.delete',['producer'=> $producer])}}">Delete</a>
                </th>
                @endauth
            </tr>
            @endforeach
        </table>
    </form>
</body>
</html>