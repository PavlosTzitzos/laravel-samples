<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a New Program Slot</h1>
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
    <form method="post" action="{{route('program.store')}}">
        @csrf
        @method('post')
        <div>
            <label> Program Week Day </label>
            <input type="text" name="program_weekday" list="weekday">
                <datalist id="weekday">
                    <option value="Monday">
                    <option value="Tuesday">
                    <option value="Wednesday">
                    <option value="Thursday">
                    <option value="Friday">
                    <option value="Saturday">
                    <option value="Sunday">
                </datalist>
        </div>
        <div>
            <label> Start Time </label>
            <input type="time" name="show_start_time" placeholder="Songs from all underground producer"/>
        </div>
        <div>
            <label> End Time </label>
            <input type="time" name="show_end_time"/>
        </div>
        <div>
            <label> Show Id </label>
            <input type="number" name="show_id"/>
        </div>
        <div>
            <input type="submit" value="Save new slot"/>
        </div>
    </form>
</body>
</html>