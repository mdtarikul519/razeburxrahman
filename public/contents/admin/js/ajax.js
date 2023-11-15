
$(document).ready(function(){
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // view user ajax
    // $('.view-modal').click(function(e) {
    //     e.preventDefault();
    //     $('#role').html( $(this).data('role'));
    //     $('#role2').html( $(this).data('role'));
    //     $('#photo').attr('src',$(this).data('photo'));
    //     $('#name').html( $(this).data('name') );
    //     $('#name2').html( $(this).data('nae'));
    //     $('#email').html( $(this).data('email'));
    //     $('#creator').html( $(this).data('creator'));
    //     $.ajax({
    //         type: 'GET',
    //         url: $(this).data('id'),
    //         dataType:'json',
    //         contentType: 'image/png',
    //         processData: true,
    //         beforeSend: function(data){
    //             $('.loading').css('display', 'block');
    //         },
    //         success: function(data){
    //             $('#name').html( data.name );
    //             $('#name2').html( data.name );
    //             $('#email').html( data.email);
    //             $('#creator').html( data.creator);
    //         },
    //         complete: function(data){
    //             $('.loading').css('display', 'none');
    //         }
    //     });
    // });

    // // update user ajax
    // $('.update-modal').click(function(e) {
    //     e.preventDefault();
    //     $('#update_role').html($(this).data('role'));
    //     $('#update_role').attr('value', $(this).data('roles'));
    //     $('#update_name').attr('value', $(this).data('name'));
    //     $('#update_email').attr('value', $(this).data('email'));
    //     $('#loginform').attr('action', $(this).data('id'));

    //     $("#submit_btn").click(function(){
    //         $("#loginform").submit(); // Submit the form
    //         // window.history.back();
    //     });
    //     var formdata = new FormData($(this)[0]);
    //     $.ajax({
    //         type: 'post',
    //         url: $(this).data('id'),
    //         dataType:'JSON',
    //         data: formdata,
    //         contentType: false,
    //         processData: false,
    //         beforeSend: function(data){
    //             $('.loading').css('display', 'block');
    //         },
    //         success: function(data){
    //             alert('adjflasdj');
    //         },
    //         complete: function(data){
    //             $('.loading').css('display', 'none');
    //         }
    //     });
    // });

    // // soft delete user ajax
    // $('.delete-modal').click(function(e) {
    //     e.preventDefault();
    //     $('#role3').html( $(this).data('role'));
    //     $('#role4').html( $(this).data('role'));
    //     $('#photo2').attr('src',$(this).data('photo'));
    //     $('#name3').html( $(this).data('name') );
    //     $('#name4').html( $(this).data('name'));
    //     $('#email2').html( $(this).data('email'));
    //     $('#creator2').html( $(this).data('creator'));
    //     $('#deletelink').html($(this).data('btn'));
    //     $('#deletelink').attr('href', $(this).data('id'));
    // });
   
    $('#submit').on('click',function(e){ 
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/admin/ajax-banner/add',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                // $(this).addClass('after-btn');
                console.log('sending');
            },
            
            success: function(){
                alert('success');
            },
            complete: function(){
                // $(this).addClass('after-btn');
                console.log('complete');
            },
            error: function(){
                console.log('error');
            }
        });
    });

});
