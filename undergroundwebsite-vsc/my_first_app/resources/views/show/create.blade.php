<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a New Show</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('show.store')}}">
        @csrf
        @method('post')
        <div>
            <label> Show Name </label>
            <input type="name" name="show_name" placeholder="Underground Playlist"/>
        </div>
        <div>
            <label> Show Description (optional) </label>
            <input type="name" name="show_description" placeholder="Songs from all underground producer"/>
        </div>
        <div>
            <label> Show Logo (optional - accepts only image filetype) </label>
            <input type="file" name="show_logo"/>
        </div>
        <div>
            <label> Producers of this show </label>
            <div id="dynamic-form">
                <!-- Input fields will be added/removed here -->
            </div>
            <button type="button" id="add-producer">Add Producer</button>

        </div>
        <div>
            <input type="submit" value="Save a new show"/>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var dynamicForm = $('#dynamic-form');
            var addButton = $('#add-producer');

            addButton.click(function() {
                dynamicForm.append('<input type="text" name="producers[]"><button type="button" class="remove-producer">Remove Producer</button><br>');
            });

            dynamicForm.on('click', '.remove-producer', function() {
                $(this).prev('input').remove();
                $(this).remove();
            });
        });
    </script>

</body>
</html>