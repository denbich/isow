    var position_count = +$('[name="position_count"]').val();
    var old_position_count;
    var current_delete_position;
    var next_position;
    var temp;
    var i = 0;

    $('#add_position').click(function () {
        position_count += 1;
        $('[name="position_count"]').val(position_count);
        var position_div = "<div class='position' data-id='"+position_count+"' id='div-position"+position_count+"'> <div class='w-100 text-right'> <button class='btn btn-icon btn-danger btn-sm text-right delete_position' id='delete_button"+position_count+"' data-id='"+position_count+"' type='button' onclick='delete_position(this)'> <span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span> </button> </div> <div class='form-group'> <label for='name_position"+position_count+"' class='mt-1'>Nazwa stanowiska "+position_count+":</label> <input type='text' class='form-control counter_name_position' maxlength='255' id='name_position"+position_count+"' name='name_position"+position_count+"' data-id='"+position_count+"' required> <p id='counter_name_position"+position_count+"' data-counter-id='"+position_count+"' class='text-sm'>0 / 255 znaków</p> </div> <div class='form-group'> <label for='description_position"+position_count+"' class='mt-1'>Opis stanowiska:</label> <textarea class='form-control counter_description_position mt-1' rows='2' maxlength='255' id='description_position"+position_count+"' style='resize: none;' name='description_position"+position_count+"' data-id='"+position_count+"' required></textarea> <p id='counter_description_position"+position_count+"' data-counter-id='"+position_count+"' class='text-sm'>0 / 255 znaków</p> </div> <div class='row form-group'> <div class='col-lg-6'> <label for='start_position"+position_count+"'>Godzina rozpoczęcia pracy</label> <input type='time' name='start_position"+position_count+"' id='start_position"+position_count+"' class='form-control' required> </div> <div class='col-lg-6 form-group'> <label for='end_position"+position_count+"'>Godzina zakończenia pracy</label> <input type='time' name='end_position"+position_count+"' id='end_position"+position_count+"' class='form-control' required> </div> </div> <div class='form-group'> <div class='row'> <div class='col'> <label for='points_position"+position_count+"'>Wartość punktowa:</label> <input type='number' class='form-control' id='points_position"+position_count+"' name='points_position"+position_count+"' required> </div> <div class='col'> <label for='max_position"+position_count+"'>Max. ilość wolontariuszy:</label> <input type='number' class='form-control' id='max_position"+position_count+"' name='max_position"+position_count+"' required> </div> </div> </div> <hr class='w-100 text-center ml-0' style='color: #707070'> </div>";
        $('#position_count').html(position_count);
        $('#positions').append(position_div);
    });

    $('.counter_name_position').on('keyup propertychange paste', function(){
        var chars = $(this).val().length;
        $("#counter_name_position"+$(this).attr('data-id')).html(chars +" / 255 znaków");
    });

    $('.counter_description_position').on('keyup propertychange paste', function(){
        var chars = $(this).val().length;
        $("#counter_description_position"+$(this).attr('data-id')).html(chars +" / 255 znaków");
    });

    function delete_position(input)
    {
        if(position_count >= 1)
        {
            old_position_count = position_count;
            position_count -= 1;
            current_delete_position = $(input).attr('data-id');
            $('#div-position'+current_delete_position).remove();
            $('#position_count').html(position_count);
            $('[name="position_count"]').val(position_count);
            next_position = +current_delete_position + +1;
            for(i = next_position; i <= old_position_count; i++)
            {
                temp = +i - +1;
                $('#div-position'+i).attr('data-id', temp);
                $('#div-position'+i).attr('id', 'div-position'+temp);

                $('#delete_button'+i).attr('data-id', temp);
                $('#delete_button'+i).attr('id', 'delete_button'+temp);

                $('[for="name_position'+i+'"]').html('Nazwa stanowiska '+temp+':');
                $('[for="name_position'+i+'"]').attr('for', 'name_position'+temp);
                $('#name_position'+i).attr('data-id', temp);
                $('#name_position'+i).attr('name', 'name_position'+temp);
                $('#name_position'+i).attr('id', 'name_position'+temp);
                $('#counter_name_position'+i).attr('data-counter-id', temp);
                $('#counter_name_position'+i).attr('id', 'counter_name_position'+temp);

                $('[for="description_position'+i+'"]').attr('for', 'description_position'+temp);
                $('#description_position'+i).attr('data-id', temp);
                $('#description_position'+i).attr('name', 'description_position'+temp);
                $('#description_position'+i).attr('id', 'description_position'+temp);
                $('#counter_description_position'+i).attr('data-counter-id', temp);
                $('#counter_description_position'+i).attr('id', 'counter_description_position'+temp);

                $('[for="start_position'+i+'"]').attr('for', 'start_position'+temp);
                $('#start_position'+i).attr('name', 'start_position'+temp);
                $('#start_position'+i).attr('id', 'start_position'+temp);

                $('[for="end_position'+i+'"]').attr('for', 'end_position'+temp);
                $('#end_position'+i).attr('name', 'end_position'+temp);
                $('#end_position'+i).attr('id', 'end_position'+temp);

                $('[for="points_position'+i+'"]').attr('for', 'points_position'+temp);
                $('#points_position'+i).attr('data-id', temp);
                $('#points_position'+i).attr('name', 'points_position'+temp);
                $('#points_position'+i).attr('id', 'points_position'+temp);

                $('[for="max_position'+i+'"]').attr('for', 'max_position'+temp);
                $('#max_position'+i).attr('data-id', temp);
                $('#max_position'+i).attr('name', 'max_position'+temp);
                $('#max_position'+i).attr('id', 'max_position'+temp);
            }
        }
    }
