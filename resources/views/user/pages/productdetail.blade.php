@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')


  <section id="product">
    <div class="container">
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="col-lg-5">
          <ul class="thumbnails mainimage">
            <li>
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/'.$product_detail->image) !!}">
                <img src="{!! asset('resources/upload/'.$product_detail->image)  !!}" alt="" title="">
              </a>
            </li>
            @foreach($image as $item_image)
            <li>
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/detail/'.$item_image->image) !!}">
                <img src="{!! asset('resources/upload/detail/'.$item_image->image)  !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
          <span>Mouse move on Image to zoom</span>

          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/'.$product_detail->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach($image as $item_image)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/detail/'.$item_image->image) !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
        </div>
         <!-- Right Details-->
        <div class="col-lg-7">
          <div class="row">
            <form class="form-vertical" role="form" action="" method="POST">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <input type="hidden" name="product_id" value="{!! $product_detail->id !!}">
            <div class="col-lg-12">
              <h1 class="productname"><span class="bgnone">{!! $product_detail->name !!}</span></h1>
              <div class="productprice">
                <div class="productpageprice">
                @if($product_detail->price_new == 0)
                  <span class="spiral"></span>{!! $product_detail->price !!} VND</div>
                @else
                  <span class="spiral"></span>{!! $product_detail->price_new !!} VND</div>
                <div class="productpageoldprice">Old price : {!! $product_detail->price !!}VND</div>
                @endif
                <ul class="rate">
                  <li class="on"></li>
                  <li class="on"></li>
                  <li class="on"></li>
                  <li class="off"></li>
                  <li class="off"></li>
                </ul>
              </div>
              <div class="quantitybox">
                <div class="col-sm-6">
                  <legend>Size</legend>
                    <select class="selectsize" name="size">
                      @foreach($size as $size)
                      <option value="{!! $size->size !!}">{!! $size->size !!}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                  <legend>Quantity</legend>
                    <div class="col-lg-5">
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" >
                    </div>

                </div>
                @include('admin.blocks.error')
                <div class="clear"></div>
<!--                 <div class="control-group">
                  <div class="controls">
                    <label class="checkbox">
                      <input type="checkbox" name="optionsCheckboxList2" value="option2">
                      Option two can also be checked and included in form results </label>
                    <label class="checkbox">
                      <input type="checkbox" name="optionsCheckboxList3" value="option3">
                      Option three can&mdash;yes, you guessed it&mdash;also be checked and included in form results </label>
                    <label class="radio">
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                      Option one is this and that—be sure to include why it's great </label>
                    <label class="radio">
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                      Option two can be something else and selecting it will deselect option one </label>
                  </div>
                </div> -->
              </div>

              @if($product_detail->status == 0)
              <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product_detail->id.'/'.$product_detail->alias) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
              @else
              <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product_detail->id.'/'.$product_detail->alias) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
              @endif

            </form>

         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#detail">Product Detail</a>
                  <li><a href="#description">Product Description</a>
                  </li>
                  <!-- <li><a href="#specification">Specification</a>
                  </li> -->
                  <li><a href="#producttag">Tags</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="detail">
                    {!! $product_detail->content !!}
                  </div>
                  <div class="tab-pane" id="description">

                    {!! $product_detail->description !!}

                  </div>

                  <!-- <div class="tab-pane " id="specification">
                  </div> -->

                  <div class="tab-pane" id="producttag">
                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum <br>
                      <br>
                    </p>
                    <ul class="tags">
                      <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> html</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> html</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> css</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> jquery</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> css</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> jquery</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> css</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> jquery</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
                      </li>
                      <li><a href="#"><i class="icon-tag"></i> html</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
        @foreach($product_related as $item_related)
        <li class="col-lg-3 col-sm-3">
          <a class="prdocutname" href="{!! url('product-detail',[$item_related->id,$item_related->alias]) !!}">{!! $item_related->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="{!! url('product-detail',[$item_related->id,$item_related->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_related->image) !!}"></a>
<!--             <div class="shortlinks">
              <a class="details" href="#">DETAILS</a>
              <a class="wishlist" href="#">WISHLIST</a>
              <a class="compare" href="#">COMPARE</a>
            </div> -->
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">${!! $item_related->price_new !!}</div>
                <div class="priceold">${!! $item_related->price !!}</div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
  <section id="popularbrands" class="container">
    <h1 class="heading1"><span class="maintext">Popular Brands</span><span class="subtext"> See Our  Popular Brands</span></h1>
    <div class="brandcarousalrelative">
      <ul id="brandcarousal">
        <li><img src="{!! url('public/user/img/brand1.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand2.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand3.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand4.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand1.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand2.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand3.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand4.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand1.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand2.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand3.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand4.jpg') !!}" alt="" title=""/></li>
      </ul>
      <div class="clearfix"></div>
      <a id="prev" class="prev" href="#">&lt;</a>
      <a id="next" class="next" href="#">&gt;</a>
    </div>
  </section>

@endsection
