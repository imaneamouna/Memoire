@extends('User.layout.layout')
@section('body')
<section class="inner_page_head">
    <div class="container_fuild">
       <div class="row">
          <div class="col-md-12">
             <div class="full">
                <h3>المنتجات</h3>
             </div>
          </div>
       </div>
    </div>
 </section>

    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    تصفح <span>منتجاتنا</span>
                </h2>
            </div>

            <div class="row">
                @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">

                    <div class="box">

                            <div class="option_container">
                                <div class="options">
                                    <a href="" class="option1">
                                        اضافه الى الطلب
                                    </a>
                                    <a href="{{route('order' ,$product->id)}}" class="option2">
                                        عرض التفاصيل
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="{{$product->image}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{$product->name}}
                                </h5>
                                <h6>
                                    {{$product->main_price }} DA
                                </h6>
                            </div>

                    </div>

                </div>
                @endforeach
            </div>


        </div>

    </section>
    <!-- end product section -->
@endsection
