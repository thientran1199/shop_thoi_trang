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
      <li class="active">Checkout</li>
    </ul>
    <div class="row">
      <!-- Account Login-->
      <div class="col-lg-12">
        @if(!Auth::check())
        <h1 class="heading1"><span class="maintext">Checkout</span><span class="subtext"> Checkout Process Steps</span></h1>
        <div class="checkoutsteptitle active">Customer<a class="modify">Modify</a>
        </div>
        <div class="checkoutstep ">

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
              <form class="form-vertical" role="form" action="{!! url('login-checkout') !!}" method="POST">
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
        @endif
        <form class="form-vertical" role="form" action="{!! url('checkout') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        @if(!Auth::check())
        <div class="checkoutsteptitle">Guest<a class="modify">Modify</a>
        </div>
        <div class="checkoutstep">
          <div class="row">
              <fieldset>
                <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >Full Name<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtFname" class=""  value="{!! old('txtFname') !!}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >E-Mail<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtEmail" class=""  value="{!! old('txtEmail') !!}">
                    </div>
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >Telephone<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtPhone" class=""  value="{!! old('txtPhone') !!}">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" >Address<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtAddress" class=""  value="{!! old('txtAddress') !!}">
                    </div>
                  </div>
              </fieldset>
          </div>
        </div>


        @endif

        <div class="checkoutsteptitle">Payment  Method<a class="modify">Modify</a>
        </div>

          <div class="checkoutstep">
            <p>Please select the preferred payment method to use on this order.</p>
            <label class="inline">
              <input name="payment" type="radio" checked="checked" value="Cash On Delivery">Cash On Delivery</label>
            <textarea name="note" rows="2" placeholder="Add Comment here..."></textarea>
            <br>

          </div>
          <div class="col-lg-4 pull-right">
            <input type="submit" class="btn btn-orange pull-right" value="CheckOut">
            <a href="{!! url('index') !!}"><input type="" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
