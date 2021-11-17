@extends('template.master')

@section('content')
    <!-- Login Section Start -->
    <div id="login" style="padding-top: 100px;">
        <div class="container">
            <div class="section-header">
                <h2>Registration</h2>
                {{-- <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim
                    at venenatis tincidunt.
                </p> --}}
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="login-form">
                        {!! form_open(base_url('landing/register/save'), 'id="register_form"') !!}
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="E.g. John"
                                    required="required" data-validation-required-message="Please enter first name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-sm-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="E.g. Sina" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <label>Mobile</label>
                                <input type="text" class="form-control" id="no_hp_user" name="no_hp_user"
                                    placeholder="E.g. 081xxxxxx" required="required" maxlength="15"
                                    onkeypress="return inputAngka(event);"
                                    data-validation-required-message="Please enter your mobile number" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-sm-6">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email_user" name="email_user"
                                    placeholder="E.g. email@example.com" required="required"
                                    data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <label>Your Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    required="required" />
                            </div>
                            <div class="control-group col-sm-6">
                                <label>Repeat Your Password</label>
                                <input type="password" id="re_password" name="re_password" class="form-control"
                                    required="required" />
                            </div>
                        </div>
                        <div class="button text-right">
                            <button type="button" id="register_submit">Register</button>
                        </div>
                        {!! form_close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->
@endsection

@push('js_script')
    <script type="text/javascript">
        $('#register_submit').click(function(e) {
            e.preventDefault();
            var check_valid = $('#register_form')[0].checkValidity();
            var url = $('#register_form')[0].action;
            if (check_valid) {
                var pass = $('#register_form #password').val();
                var re_pass = $('#register_form #re_password').val();
                if (pass != re_pass) {
                    alert('Password tidak sama!');
                } else {
                    $("#loading-show").fadeIn("slow");
                    $.ajax({
                        type: "POST",
                        url: url,
                        dataType: "json",
                        data: $('#register_form').serialize(),
                        cache: false,
                        success: function(res) {
                            $("#loading-show").fadeIn("slow").delay(20).fadeOut('slow');

                            if (res.response) {
                                location.href = res.url;
                            } else {
                                alert(res.alert);
                            }
                        }
                    });
                }
            } else {
                alert('Isi semua form!');
            }
        });
    </script>

    <script type="text/javascript">
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 46 || charCode > 57))
                return false;
            return true;
        }
    </script>
@endpush
