@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_login_title') .' - '. get_site_title())
@section('content')
    <div class="container account-login ">
        <div class="row">
           <ul class="breadcrumb">
              <li><a href="#"><i class="fa fa-home"></i></a></li>
              <li><a href="#">Account</a></li>
              <li><a href="#">Login</a></li>
           </ul>
           <div id="content" class="col-md-9">
              <div class="row">
                <div class="col-sm-6">

                    <div class="well col-sm-12">

                       <h2>Login</h2>
                       <p></p>
                       @include('pages-message.notify-msg-error')
                       @include('pages-message.form-submit')
                       <form action="#" method="post" enctype="multipart/form-data">
                        @include('includes.csrf-token')
                          <div class="form-group">
                             <label class="control-label" for="username">Email</label>
                             <input type="text"name="login_email" id="login_email" placeholder="Email" id="username"
                                class="form-control">
                          </div>
                          <div class="form-group">
                             <label class="control-label" for="input-password">Password</label>
                             <input type="password" name="login_password" id="login_password" value="" placeholder="Password"
                                id="input-password" class="form-control">
                             <a href="{{ route('user-forgot-password-page') }}">Forgot Password</a></div>
                             @if($frontend_login_data['is_enable_recaptcha'] == true)
                                <div class="form-group">
                                <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
                                </div>
                                @endif

                          <input type="submit" value="Login" class="btn btn-primary pull-left">
    
                        </form>
                      
                    </div>
                 </div>
                 <div class="col-sm-6">
                    <div class="well ">
                       <h2>New Customer</h2>
                       <p><strong>Register Account</strong></p>
                       <p>By creating an account you will be able to shop faster, be up to date on an order's
                          status, and keep track of the orders you have previously made.</p>
                       <a href="{{ route('user-registration-page') }}" class="btn btn-primary">Register</a>
                    </div>
                 </div>
                 
              </div>
           </div>
           <aside class="col-md-3 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
              
           </aside>
        </div>

     </div>
@endsection