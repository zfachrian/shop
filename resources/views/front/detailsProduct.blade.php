@extends('front.templates.main')
@section('title') Shop @endsection
@section('isi')
        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="product__details__container">
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <img src="{{asset('storage/'.$product->product_img)}}" alt="full-image">
                                    {{-- <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2>{{$product->product_name}}</h2>
                            </div>
                            <div class="pro__dtl__rating">
                                <ul class="pro__rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <span class="rat__qun">(Based on 0 Ratings)</span>
                            </div>
                            <div class="pro__details">
                                <p>{{$product->product_description}} </p>
                            </div>
                            <ul class="pro__dtl__prize">
                                {{-- <li class="old__prize">$15.21</li> --}}
                                <li>Rp. {{$product->product_price}}</li>
                            </ul>
                            <div class="product-action-wrap">
                                <div class="prodict-statas"><span>Jumlah :</span></div>
                                <div class="product-quantity">
                                    <form  id="form_jumlah" role="form" method="post" action="/buy/{{$product->id}}" target="_blank" enctype="multipart/form-data">
                                        @csrf
                                        <div class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" id="jumlah" name="jumlah" value="1">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <ul class="pro__dtl__btn">
                                <li class="buy__now__btn"><button href="" form="form_jumlah" type="submit" style="background-color:#fff;"><a>Beli</a></button></li>
                                {{-- <li><a href="#"><span class="ti-heart"></span></a></li> --}}
                                {{-- <li><a href="#"><span class="ti-email"></span></a></li> --}}
                            </ul>
                                    </form>
                            {{-- <div class="pro__social__share">
                                <h2>Share :</h2>
                                <ul class="pro__soaial__link">
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Product tab -->
        <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--60" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#description" role="tab" data-toggle="tab">Product Terkait</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                <div class="product-slider-active owl-carousel">
                                    @foreach ($productKat as $item)
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="/detailProduct/{{$item->id}}">
                                                        <img src="{{asset('storage/'.$item->product_img)}}" alt="product images">
                                                    </a>
                                                </div>
                                                {{-- <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal"
                                                                title="Quick View"
                                                                class="quick-view modal-view detail-link"
                                                                href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span
                                                                    class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span
                                                                    class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">{{$item->product_name}}</a></h2>
                                                <ul class="product__price">
                                                    {{-- <li class="old__price">$16.00</li> --}}
                                                    <li class="new__price">Rp. {{$item->product_price}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Single Content -->                 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product tab -->
    @endsection