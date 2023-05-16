@extends('User.layout.layout')
@section('body')
      <div class="hero_area">
         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="{{"User"}}/assets/images/slider-bg.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                        تسوق معنا

                                    </span>
                                    <br>
                                    تعلم المزيد حول منتجاتنا وخدماتنا الرائعة وكيف يمكن لها تلبية احتياجاتك الفريدة
                                 </h1>
                                 <p>
                                 </p>
                                 <div class="btn-box">
                                    <a href="{{route('login')}}" class="btn1">
                                        تسوق الان
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>



               </div>
               <div class="container">
                  <ol class="carousel-indicators">
                     <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                     <li data-target="#customCarousel1" data-slide-to="1"></li>
                     <li data-target="#customCarousel1" data-slide-to="2"></li>
                  </ol>
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>


@endsection

