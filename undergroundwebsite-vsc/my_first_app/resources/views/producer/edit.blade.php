<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Producer</h1>
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
    <form method="post" action="{{route('producer.update',['producer'=>$producer])}}">
        @csrf
        @method('put')
        <div>
            <label> Producer First Name </label>
            <input type="name" name="first_name" placeholder="Christos" value="{{$producer->first_name}}"/>
        </div>
        <div>
            <label> Producer Second Name (optional) </label>
            <input type="name" name="second_name" placeholder="Giannis" value="{{$producer->second_name}}"/>
        </div>
        <div>
            <label> Producer Last Name </label>
            <input type="name" name="last_name" placeholder="Papadopoulos" value="{{$producer->last_name}}"/>
        </div>
        <div>
            <label> Producer Phone Number </label>
            <input type="number" name="phone_number" placeholder="6983729286" value="{{$producer->phone_number}}"/>
        </div>
        <div>
            <label> Producer Email </label>
            <input type="email" name="email" placeholder="example@example.com" value="{{$producer->email}}"/>
        </div>
        <div>
            <input type="submit" value="Update show"/>
        </div>
    </form>
</body>
</html>