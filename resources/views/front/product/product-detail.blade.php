@extends('front.master')

@section('title')
    Product Details
@endsection

@section('body')
    <!-- banner-2 -->
    <div class="page-head_agile_info_w3l">

    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="index.html">Home</a>
                        <i>|</i>
                    </li>
                    <li>Single Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Single Page
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <div class="col-md-5 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{ asset($product->product_image) }}">
                                <div class="thumb-image">
                                    <img src="{{ asset($product->product_image) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                            @foreach($subImages as $subImage)
                                <li data-thumb="{{ asset($subImage->sub_image) }}">
                                    <div class="thumb-image">
                                        <img src="{{ asset($subImage->sub_image) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                                </li>
                            @endforeach

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 single-right-left simpleCart_shelfItem">
                <h3>{{ $product->product_name }}</h3>
                <div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked="">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
                </div>
                <p>
                    <span class="item_price">BDT-{{ $product->product_price }}</span>
                    <del>$1300.00</del>
                </p>
                <div class="single-infoagile">
                    {{ $product->product_short_description }}
                </div>
                <div class="product-single-w3l">
                    {{ $product->product_long_description }}
                </div>
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="{{ route('add-to-cart') }}" method="post">
                            {{ csrf_field() }}
                            <br>
                                <input type="number" name="qty" min="1" value="1" class="form-control" /></br>
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <input type="submit" name="submit" value="Add to cart" class="button" />
                            </fieldset>
                        </form>
                    </div>

                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //Single Page -->
    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Relative Product
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach($categoryProducts as $categoryProduct)
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <a href="single.html">
                                    <img src="{{ asset($categoryProduct->product_image) }}" alt="">
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="{{ route('product-details',['id'=>$categoryProduct->id]) }}">{{ ($categoryProduct->product_name) }}</a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    <h6>{{ ($categoryProduct->product_price) }}</h6>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                                            <input type="hidden" name="amount" value="220.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- //special offers -->
@endsection