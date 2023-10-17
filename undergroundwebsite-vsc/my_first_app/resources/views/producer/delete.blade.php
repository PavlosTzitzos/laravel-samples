<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Delete a Producer</h1>
    <form method="post" action="{{route('producer.destroy',['producer'=>$producer])}}">
        @csrf
        @method('delete')
        <div>
            <label> Producer First Name </label>
            <input type="name" name="first_name" placeholder="Christos" value="{{$producer->first_name}}" disabled/>
        </div>
        <div>
            <label> Producer Second Name (optional) </label>
            <input type="name" name="second_name" placeholder="Giannis" value="{{$producer->second_name}}" disabled/>
        </div>
        <div>
            <label> Producer Last Name </label>
            <input type="name" name="last_name" placeholder="Papadopoulos" value="{{$producer->last_name}}" disabled/>
        </div>
        <div>
            <label> Producer Phone Number </label>
            <input type="number" name="phone_number" placeholder="6983729286" value="{{$producer->phone_number}}" disabled/>
        </div>
        <div>
            <label> Producer Email </label>
            <input type="email" name="email" placeholder="example@example.com" value="{{$producer->email}}" disabled/>
        </div>
        <div>
            <input type="submit" value="Confirm Delete Producer"/>
        </div>
    </form>
</body>
</html>