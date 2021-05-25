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
      <li class="active">Register Account</li>
    </ul>
    <div class="row">        
      <!-- Account Login-->
      <div class="col-lg-12">

        <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext"> Register Your details with us</span></h1>
          <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.blocks.error')
            <form class="form-vertical" role="form" action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="form-group">
                  <label>Username<span class="red">*</span></label>
                  <input type="text" class="form-control" name="txtUser" placeholder="Please Enter Username" value="{!! old('txtUser') !!}" />
              </div>
              <div class="form-group">
                  <label>Password<span class="red">*</span></label>
                  <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
              </div>
              <div class="form-group">
                  <label>RePassword<span class="red">*</span></label>
                  <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
              </div>
              <div class="form-group">
                  <label>Full Name<span class="red">*</span></label>
                  <input type="text" class="form-control" name="txtFName" placeholder="Please Enter Full Name" value="{!! old('txtFName') !!}"/>
              </div>
              <div class="form-group">
                  <label>Gender<span class="red">*</span></label>
                  <label class="radio-inline">
                      <input name="rdoGender" value="1" checked="" type="radio">Male
                  </label>
                  <label class="radio-inline">
                      <input name="rdoGender" value="0" type="radio">Female
                  </label>
              </div>
              <div class="form-group">
                  <label>Email<span class="red">*</span></label>
                  <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail') !!}"/>
              </div>
              <div class="form-group">
                  <label>Address<span class="red">*</span></label>
                  <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Address" value="{!! old('txtAddress') !!}"/>
              </div>
              <div class="form-group">
                  <label>Phone Number<span class="red">*</span></label>
                  <input type="text" class="form-control" name="txtPhone" placeholder="Please Enter Phone Number" value="{!! old('txtPhone') !!}"/>
              </div>
              <input type="submit" class="btn btn-orange pull-left" value="Register">
            </form>
          </div> 
      </div>        
    </div>
  </div>
</section>

@endsection