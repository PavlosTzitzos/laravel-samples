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
    <form method="post" action="{{route('program.destroy',['program'=>$program])}}">
        @csrf
        @method('delete')
        <div>
            <label> Program Week Day </label>
            <input type="text" name="program_weekday" value="{{$program->program_weekday}}" disabled>
        </div>
        <div>
            <label> Start Time </label>
            <input type="time" name="show_start_time" placeholder="Songs from all underground producer" value="{{$program->show_start_time}}" disabled/>
        </div>
        <div>
            <label> End Time </label>
            <input type="time" name="show_end_time" value="{{$program->show_end_time}}" disabled/>
        </div>
        <div>
            <label> Show Id </label>
            <input type="number" name="show_id" value="{{$program->show_id}}" disabled/>
        </div>
        <div>
            <input type="submit" value="Confirm Delete Slot"/>
        </div>
    </form>
</body>
</html>