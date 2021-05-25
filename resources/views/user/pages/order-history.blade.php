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
            <h1 class="heading1"><span class="maintext">Order History</span><span class="subtext">View All your orders</span></h1>
            <div class="container col-md-6"   style="">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <th>Order ID</th>
                  <th>Date Order</th>
                  <th>Status</th>
                  <th>Total</th>
                </thead>
                <tbody>
                  @foreach($orders as $item)
                  <tr>
                    <td>{!! $item->id !!} <a href="#" style="color: Blue; float: right;">Details</a></td>
                    <td>{!! $item->date_order !!}</td>
                    <td>
                      @if($item->status == 0)
                        New Order
                      @elseif($item->status == 1)
                        Not Delivered Yet
                      @elseif($item->status == 2)
                        Shipped
                      @elseif($item->status == 3)
                        Delivered
                      @endif
                    </td>
                    <td style="color: red;">{!! $item->total !!} VND</td>
                  </tr>
                  @endforeach
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
