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
        <li class="active"> Shopping Cart</li>
      </ul>
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      @if(Cart::count() != 0)
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="name">Size</th>
            <th class="quantity">Qty</th>
            <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>

          </tr>
<!--           <form method="POST" acction="#">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"> -->
          @foreach($content as $item)
          <tr>
            <td class="image"><a href="{!! url('product-detail',[$item->id]) !!}"><img title="product" alt="product" src="{!! asset('resources/upload/'.$item->options['img']) !!}" height="50" width="50"></a></td>
            <td  class="name"><a href="{!! url('product-detail',[$item->id]) !!}">{!! $item->name !!}</a></td>
            <td  class="name">{!! $item->options['size'] !!}</td>
            <td class="quantity"><input class="col-lg-1 qty" type="text" size="20" value="{!! $item->qty !!}" name="quantity" ></td>
            <td class="total">
              <a href="javascript:void(0)" class="updatecart" id="{!! $item->rowId !!}"><img class="tooltip-test" data-original-title="Update" src="{{asset('user/img/update.png') }}"></a>
              <a href="{!! url('detete-cart',['id'=>$item->rowId]) !!}"><img class="tooltip-test" data-original-title="Remove"  src="{{asset('user/img/remove.png') }}" alt=""></a></td>
            <td class="price">{!! $item->price !!} VND</td>
            <td class="total">{!! $item->price*$item->qty !!} VND</td>
          </tr>
          @endforeach
         <!--  </form>  -->
        </table>
      </div>

      <div class="container">
      <div>
          <div class="col-lg-4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold">Sub-Total :</span></td>
                <td><span class="bold">{!! Cart::subtotal(); !!} VND</span></td>
              </tr>
              <tr>
                <td><span class="extra bold">VAT (5%) :</span></td>
                <td><span class="bold">{!! Cart::tax(); !!} VND</span></td>
              </tr>
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">{!! Cart::total(); !!} VND</span></td>
              </tr>
            </table>
            <a href="{!! url('check-out') !!}"><input type="submit" value="CheckOut" class="btn btn-orange pull-right"></a>
            <a href="{!! url('index') !!}"><input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
          </div>
        </div>
        </div>
        @else
          <h2>There are no items in your cart...</h2>
          <a href="{!! url('index') !!}"><input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
        @endif
    </div>
  </section>


@endsection
