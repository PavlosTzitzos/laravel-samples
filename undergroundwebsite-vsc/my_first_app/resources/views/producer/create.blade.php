<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a New Producer</h1>
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
    <form method="post" action="{{route('producer.store')}}">
        @csrf
        @method('post')
        <div>
            <label> Producer First Name </label>
            <input type="name" name="first_name" placeholder="Christos"/>
        </div>
        <div>
            <label> Producer Second Name (optional) </label>
            <input type="name" name="second_name" placeholder="Giannis"/>
        </div>
        <div>
            <label> Producer Last Name </label>
            <input type="name" name="last_name" placeholder="Papadopoulos"/>
        </div>
        <div>
            <label> Producer Phone Number </label>
            <input type="number" name="phone_number" placeholder="6983729286"/>
        </div>
        <div>
            <label> Producer Email </label>
            <input type="email" name="email" placeholder="example@example.com"/>
        </div>
        <div>
            <input type="submit" value="Save a new producer"/>
        </div>
    </form>
</body>
</html>