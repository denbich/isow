var _token = $('meta[name="csrf-token"]').attr('content');
//CREATE FOLDER
$(document).ready(function() {
    $('#create_folder_button').on('click', function(e){
        e.preventDefault();
        $('#createfoldermodal').modal('hide');
        var name = $("#folder_name");
        var color = $("#folder_color");

        console.log(name.val());
        $.ajax({
        url: "/coordinator/cloud/create-folder",
        type:"POST",
        //contentType: false,
        //cache: false,
        //processData:false,
        data:{
            name:name.val(),
            color:color.val(),
            _token: _token
        },
        success:function(response){
            console.log(response);
            if(response) {

                $('#folder-div').append(response);
                name.val('Nowy folder');
                color.val('primary').change();
              }
            },
            error: function(error) {
                console.log(error);

                if(error.status == 422)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Błąd!',
                        text: 'Upewnij się, że wszystkie luki zostały uzupełnione!',
                        showConfirmButton: false,
                        timer: 4000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Błąd!',
                        text: 'Wystąpił błąd podczas dodawania folderu! Spróbuj ponownie później.',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    name.val('Nowy folder');
                    color.val('primary').change();
                }
            }
        });
    });
    $('#upload_file_button').on('click', function(){
        $('#upload_file_input').trigger('click');
        $('#upload_file_input').change(function(event){
            let form = new FormData(document.getElementById('file_form'));
            $.ajax({
                url: "/coordinator/cloud/upload-file",
                type:"POST",
                data: form,
                success:function(response){
                    console.log(response);
                    if(response) {

                      }
                    },
                    error: function(error) {
                        console.log(error);

                        if(error.status == 422)
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Błąd!',
                                text: 'Upewnij się, że plik został załączony!',
                                showConfirmButton: false,
                                timer: 4000
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Błąd!',
                                text: 'Wystąpił błąd podczas dodawania pliku! Spróbuj ponownie później.',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                });
        });
    });
});
