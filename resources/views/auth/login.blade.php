@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')

  <section id="product">
    <div class="container">
      <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Login</li>
      </ul>
       <!-- Account Login-->
      <div class="row">  
        <div class="col-lg-12">
          <h1 class="heading1"><span class="maintext">Login</span></h1>
          <section class="returncustomer">
            <h2 class="heading2">Returning Customer </h2>
            <div class="loginbox">
              <h4 class="heading4">You already have an account. Please login:</h4>
              @if(Session::has('flash_message'))
                  <div class="alert alert-{!! Session::get('flash_level') !!}">
                      {!! Session::get('flash_message') !!}
                  </div>
              @endif
              @include('admin.blocks.error')
              <form class="form-vertical" role="form" action="" method="POST">
                 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">Username:</label>
                    <div class="controls">
                      <input type="text" name="txtUsername" placeholder="Username" class="" value="{!! old('txtUsername') !!}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Password:</label>
                    <div class="controls">
                      <input type="password" name="txtPass" placeholder="Password" class="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="checkbox" name="remember" value="true">Remember me   
                    <br>
                    <a class="" href="#">Forgot your Password?</a>
                  </div>
                  <button type="submit" class="btn btn-orange">Login</button>
                </fieldset>
              </form>
            </div>
          </section>
          <section class="newcustomer">
            <h2 class="heading2">New Customer </h2>
            <div class="loginbox">
              <h4 class="heading4"> Register Account</h4>
              <p>Register at Shop Fashion ST to use the functions on the website and update information of our new products in the fastest way.</p>
              <br>
              <br>
              <a href="{!! url('register') !!}" class="btn btn-orange">Register Account</a>
            </div>
          </section>
        </div>
        

      </div>
    </div>
  </section>


@endsection