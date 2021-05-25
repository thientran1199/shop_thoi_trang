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
            <h1 class="heading1"><span class="maintext">My Accounts</span><span class="subtext">View All your account information</span></h1>  
            <div class="container col-md-6"   style="">
                <h4></h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-3">Account information</th>
                        <th class="col-md-6"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Username</td>
                        <td>{!! $user_detail->username !!}</td>
                    </tr>
                    <tr>
                        <td>Fullname</td>
                        <td>{!! $user_detail->fullname !!}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{!! $user_detail->email !!}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>@if($user_detail->gender == 0)
                              Female
                            @else
                              Male
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{!! $user_detail->address !!}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{!! $user_detail->phone !!}</td>
                    </tr>
                    </tbody>
                </table>
              </div>
     
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