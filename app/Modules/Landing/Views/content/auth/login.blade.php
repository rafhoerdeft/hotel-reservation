@extends('template.master')

@section('content')
    <!-- Login Section Start -->
    <div id="login" style="padding-top: 100px;">
        <div class="container">
            <div class="section-header">
                <h2>Login</h2>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    {!! show_alert() !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-form">
                        {!! form_open(base_url('landing/login/process')) !!}
                        <div class="form-row">
                            <div class="control-group col-sm-12">
                                <label>Your Email</label>
                                <input type="email" name="username" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="control-group col-sm-12">
                                <label>Your Password</label>
                                <input type="password" name="password" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="button text-right">
                            <button type="submit">Login</button>
                        </div>
                        {!! form_close() !!}
                        <hr>
                        <div class="text-center">
                            <a href="{{ base_url('landing/register') }}" style="width: 100%">
                                <span>Don't have an account yet? <b>Register now</b></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->
@endsection
