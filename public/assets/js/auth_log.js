$('#loginform').submit(function(e){
    e.preventDefault();
    var username = $('#username').val();
    var password = $('#password').val();
    var url = $(this)[0].action;
    
    if (username != '' && password != '') {
        $(".loading-page").show();
        $.ajax({
            type : "POST",
            url  : url,
            dataType : "json",
            data : $(this).serialize(),
            success: function(data){
                $(".loading-page").hide();

                if(data.success){
                    window.location = data.link;
                } else {
                    toastr.error(data.alert, 'Login Gagal!', {positionClass: 'toast-top-right', containerId: 'toast-top-right'});
                    grecaptcha.reset();
                }
            }
        });

        return false;
    }

});