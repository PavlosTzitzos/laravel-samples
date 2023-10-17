<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Program</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    @auth
    <div>
        <a href="{{route('program.create')}}">Create New Program Slot</a>
    </div>
    <div>
        <a href="{{route('program.clear')}}">Clear the program of the week</a>
    </div>
    @endauth
    <div>
        <table border="1">
            <tr>
                <th>Week Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Show ID</th>
                @auth
                <th>Edit</th>
                <th>Delete</th>
                @endauth
            </tr>
            @foreach($programs as $program)
            <tr>
                <th>{{$program->program_weekday}}</th>
                <th>{{$program->show_start_time}}</th>
                <th>{{$program->show_end_time}}</th>
                <th>{{$program->show_id}}</th>
                @auth
                <th>
                    <a href="{{route('program.edit',['program'=> $program])}}">Edit</a>
                </th>
                <th>
                    <a href="{{route('program.delete',['program'=> $program])}}">Delete</a>
                </th>
                @endauth
            </tr>
            @endforeach
        </table>
    </form>
</body>
</html>