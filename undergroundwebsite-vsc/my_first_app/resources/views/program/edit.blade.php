<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Program Slot</h1>
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
    <form method="post" action="{{route('program.update',['program'=>$program])}}">
        @csrf
        @method('put')
        <div>
            <label> Program Week Day </label>
            <input type="text" name="program_weekday" list="weekday" value="{{$program->program_weekday}}">
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
            <input type="time" name="show_start_time" placeholder="Songs from all underground producer" value="{{$program->show_start_time}}"/>
        </div>
        <div>
            <label> End Time </label>
            <input type="time" name="show_end_time" value="{{$program->show_end_time}}"/>
        </div>
        <div>
            <label> Show Id </label>
            <input type="number" name="show_id" value="{{$program->show_id}}"/>
        </div>
        <div>
            <input type="submit" value="Update show"/>
        </div>
    </form>
</body>
</html>