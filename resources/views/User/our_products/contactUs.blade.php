@extends('User.layout.layout')
@section('body')

{{-- <body class="sub_page"> --}}

    <!-- inner page section -->
    <section class="inner_page_head">
       <div class="container_fuild">
          <div class="row">
             <div class="col-md-12">
                <div class="full">
                   <h3>تواصل معنا</h3>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- end inner page section -->
    <!-- why section -->
    <section class="why_section layout_padding">
       <div class="container">

          <div class="row">
             <div class="col-lg-8 offset-lg-2">
                <div class="full">
                   <form action="index.html">
                      <fieldset>
                         <input type="text" placeholder="ادخل الاسم الكامل"" name="name" required />
                         <input type="email" placeholder="ادخل الايميل" name="email" required />
                         <input type="text" placeholder="ادخل الموضوع" name="subject" required />
                         <textarea placeholder="ادخل الرساله" required></textarea>
                         <input type="submit" value="ارسال" />
                      </fieldset>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
   

@endsection
