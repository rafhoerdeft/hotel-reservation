$(function () { 

    $("#bookingForm input, #bookingForm select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
        },
        submitSuccess: function ($form, event) {
            event.preventDefault();
            var fname = $("input#fname").val();
            var lname = $("input#lname").val();
            var name = fname + ' ' + lname;
            var mobile = $("input#mobile").val();
            var email = $("input#email").val();
            var date_1 = $("input#date-1").val();
            var date_2 = $("input#date-2").val();
            var time_1 = $("input#time-1").val();
            var time_2 = $("input#time-2").val();
            var adult = $("select#adult").val();
            var kid = $("select#kid").val();
            var request = $("input#request").val();
            

            $this = $("#bookingButton");
            $this.prop("disabled", true);
            $.ajax({
                url: "././mail/booking.php",
                type: "POST",
                data: {
                    fname: fname,
                    lname: lname,
                    mobile: mobile,
                    email: email,
                    date_1: date_1,
                    time_1: time_1,
                    date_2: date_2,
                    time_2: time_2,
                    adult: adult,
                    kid: kid,
                    request: request
                },
                cache: false,
                success: function () {
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                    $('#success > .alert-success')
                            .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                            .append('</div>');
                    $('#bookingForm').trigger("reset");
                },
                error: function () {
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                    $('#success > .alert-danger').append($("<strong>").text("Sorry " + name + ", it seems that our mail server is not responding. Please try again later!"));
                    $('#success > .alert-danger').append('</div>');
                    $('#bookingForm').trigger("reset");
                },
                complete: function () {
                    setTimeout(function () {
                        $this.prop("disabled", false);
                    }, 1000);
                }
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

$('#name').focus(function () {
    $('#success').html('');
});
