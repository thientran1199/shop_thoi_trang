@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')

  <!-- Slider Start-->
  @include('user.blocks.slider')
  <!-- Slider End-->

  <!-- Section Start-->
  @include('user.blocks.otherdetail')
  <!-- Section End-->

<!-- Featured Product-->
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="col-lg-3  col-sm-6">
        <a class="prdocutname" href="{!! url('product-detail',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          @if($item->price_new != 0)
          <span class="sale tooltip-test">Sale</span>
          @endif
          <a href="{!! url('product-detail',[$item->id,$item->alias]) !!}"><img alt=""  width="500" height="500" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
<!--           <div class="shortlinks">
            <a class="details" href="#">DETAILS</a>
            <a class="wishlist" href="#">WISHLIST</a>
            <a class="compare" href="#">COMPARE</a>
          </div> -->
          <div class="pricetag">
            @if($item->status == 0)
              <span class="spiral"></span><a href="{!! url('product-detail',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
            @else
              <span class="spiral"></span><a href="{!! url('add-to-cart',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
            @endif
            <div class="price">
              @if($item->price_new == 0)
                <div class="pricenew">{!! $item->price !!} VND</div>
              @else
                <div class="pricenew">{!! $item->price_new !!} VND</div>
                <div class="priceold">{!! $item->price !!} VND</div>
              @endif
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our Latest Products</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="col-lg-3 col-sm-6">
        <a class="prdocutname" href="{!! url('product-detail',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          @if($item->price_new != 0)
          <span class="sale tooltip-test">Sale</span>
          @endif
          <a href="{!! url('product-detail',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
<!--           <div class="shortlinks">
            <a class="details" href="#">DETAILS</a>
            <a class="wishlist" href="#">WISHLIST</a>
            <a class="compare" href="#">COMPARE</a>
          </div> -->
          <div class="pricetag">
            @if($item->status == 0)
              <span class="spiral"></span><a href="{{ url('add-to-cart/'.$item->id) }}" class="productcart">ADD TO CART</a>
            @else
            <span class="spiral"></span><a href="{{ url('add-to-cart/'.$item->id) }}" class="productcart">ADD TO CART</a>
            @endif
            <div class="price">
              @if($item->price_new == 0)
                <div class="pricenew">{!! $item->price !!} VND</div>
              @else
                <div class="pricenew">{!! $item->price_new !!} VND</div>
                <div class="priceold">{!! $item->price !!} VND</div>
              @endif
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>
@endsection
