<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var dynamicForm = $('#dynamic-form');
        var addButton = $('#add-field');

        addButton.click(function() {
            dynamicForm.append('<input type="text" name="dynamic_fields[]"><button type="button" class="remove-field">Remove</button><br>');
        });

        dynamicForm.on('click', '.remove-field', function() {
            $(this).prev('input').remove();
            $(this).remove();
        });
    });
</script>
