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
        <li class="active">My Account</li>
      </ul>
      <div class="row">
        
        <!-- My Account-->
      <div class="col-lg-9">
        <h1 class="heading1"><span class="maintext">Edit Your Account</span><span class="subtext">Edit Your Account Infomation</span></h1>  
      <form action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="txtUser" placeholder="Please Enter Password" value="{!! old('txtUser',isset($user_edit) ? $user_edit['username'] : null) !!}" disabled />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>RePassword</label>
                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="txtFName" placeholder="Please Enter Full Name" value="{!! old('txtFName',isset($user_edit) ? $user_edit['fullname'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <label class="radio-inline">
                    <input name="rdoGender" value="1"
                    @if($user_edit['gender'] == 1)
                     checked="checked" 
                    @endif
                     type="radio">Male
                </label>
                <label class="radio-inline">
                    <input name="rdoGender" value="0"
                    @if($user_edit['gender'] == 0)
                     checked="checked" 
                    @endif
                    type="radio">Female
                </label>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail',isset($user_edit) ? $user_edit['email'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Address" value="{!! old('txtAddress',isset($user_edit) ? $user_edit['address'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="txtPhone" placeholder="Please Enter Phone Number" value="{!! old('txtPhone',isset($user_edit) ? $user_edit['phone'] : null) !!}"/>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
      </form>
      </div>
        <!-- Sidebar Start-->
          <aside class="col-lg-3">
            <div class="sidewidt">
              <h2 class="heading2"><span>Account</span></h2>
              <ul class="nav nav-list categories">
                @if(Auth::user()->level == 1)
                <li>
                  <a href="{!! url('admin/bill/list') !!}">Admin Pages</a>
                </li>
                @endif
                <li>
                  <a href="{!! url('edit-account') !!}">Edit Account</a>
                </li>
                <li><a href="{!! url('order-history') !!}">Order History</a>
                </li>
                <li>
                  <a href=" {!! url('logout') !!}">Logout</a>
                </li>
              </ul>
            </div>
          </aside>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
@endsection