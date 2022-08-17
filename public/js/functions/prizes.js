    var combination_count = +$('[name="combination_count"]').val();
    var old_combination_count;
    var current_delete_combination;
    var next_combination;
    var temp;
    var i = 0;

    $('#add_combination').click(function () {
        combination_count += 1;
        $('[name="combination_count"]').val(combination_count);
        var combination_div = "<div id='combination"+combination_count+"' data-id='"+combination_count+"'><div id='divcombination"+combination_count+"'><div class='w-100 text-right' id='buttoncombination"+combination_count+"'> <button class='btn btn-icon btn-danger btn-sm text-right delete_combination' id='delete_button"+combination_count+"' data-id='"+combination_count+"' type='button' onclick='delete_combination(this)'> <span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span> </button></div></div>  <div class='pb-0' id='div-combination"+combination_count+"'><label for='name_combination"+combination_count+"' class='mt-1'>Kombinacja nr "+combination_count+":</label><input type='text' class='form-control' maxlength='255' data-id='"+combination_count+"' id='name_combination"+combination_count+"' name='name_combination"+combination_count+"' required><label for='quanitity_combination"+combination_count+"' class='mt-1'>Ilość:</label><input type='number' name='quanitity_combination"+combination_count+"' class='form-control' data-id='"+combination_count+"' id='quanitity_combination"+combination_count+"'></div> <hr class='w-100 text-center ml-0' style='color: #707070'></div>";

        $('#combination_count').html(combination_count);
        $('#combinations').append(combination_div);
    });

    function delete_combination(input)
    {
        if(combination_count >= 1)
        {
            old_combination_count = combination_count;
            combination_count -= 1;
            current_delete_combination = $(input).attr('data-id');
            $('#combination'+current_delete_combination).remove();
            $('#combination_count').html(combination_count);
            $('[name="combination_count"]').val(combination_count);
            next_combination = +current_delete_combination + +1;
            for(i = next_combination; i <= old_combination_count; i++)
            {
                temp = +i - +1;

                $('#combination'+i).attr('data-id', temp);
                $('#combination'+i).attr('id', 'combination'+temp);

                $('#divcombination'+i).attr('data-id', temp);
                $('#divcombination'+i).attr('id', 'divcombination'+temp);
                $('#div-combination'+i).attr('id', 'div-combination'+temp);

                $('#delete_button'+i).attr('data-id', temp);
                $('#delete_button'+i).attr('id', 'delete_button'+temp);

                $('[for="name_combination'+i+'"]').html('Kombinacja nr '+temp+':');
                $('[for="name_combination'+i+'"]').attr('for', 'name_combination'+temp);
                $('#name_combination'+i).attr('data-id', temp);
                $('#name_combination'+i).attr('name', 'name_combination'+temp);
                $('#name_combination'+i).attr('id', 'name_combination'+temp);

                $('[for="quanitity_combination'+i+'"]').html('Ilość');
                $('[for="quanitity_combination'+i+'"]').attr('for', 'quanitity_combination'+temp);
                $('#quanitity_combination'+i).attr('data-id', temp);
                $('#quanitity_combination'+i).attr('name', 'quanitity_combination'+temp);
                $('#quanitity_combination'+i).attr('id', 'quanitity_combination'+temp);
            }
        }
    }
