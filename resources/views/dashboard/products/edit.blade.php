@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3> المنتجات
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Sub Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>اضافة منتج</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- //  @method('put') --}}

                                    <div class="col-12">

                                        @if ($errors->any())
                                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                        @endif

                                        <div class="form-group">
                                            <label for="validationCustomtitle" class="col-form-label pt-0">القسم</label>
                                            <select name="category_id" id="" class="form-control" required>
                                                <option value="">اختر القسم</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id == $product->category_id) selected @endif>
                                                        {{ $category->name }}</option>
                                                    @if ($category->child)
                                                        @foreach ($category->child as $child)
                                                            <option value="{{ $child->id }}"
                                                                @if ($child->id == $product->category_id) selected @endif>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $child->name }}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="validationCustom05" class="col-form-label pt-0">
                                                الصورة الرئيسية للمنتج</label>
                                            <input class="form-control dropify" id="validationCustom05" type="file"
                                                name="image" data-default-file="{{ asset($product->image) }}">
                                        </div>


                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0">
                                                اسم المنتج</label>
                                            <input class="form-control" id="validationCustom01" type="text"
                                                name="name" required value="{{ $product->name }}">
                                        </div>


                                        <div class="form-group">
                                            <label class="col-form-label">وصف المنتج</label>
                                            <textarea rows="5" cols="12" name="description">{{ $product->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                السعر الأساسي للمنتج </label>
                                            <input class="form-control" id="validationCustom02" type="text"
                                                name="main_price" value="{{ $product->main_price }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                التخفيض الأساسي للمنتج </label>
                                            <input class="form-control" id="validationCustom02" type="text"
                                                name="main_discount" value="{{ $product->main_discount }}">
                                        </div>


                                        <div class="form-group">
                                            <label for="validationCustom05" class="col-form-label pt-0">
                                                الكميه المتاحه </label>
                                            <input class="form-control " id="validationCustom05" type="text"
                                                value="{{ $product->quantity }}" name="quantity" multiple>
                                        </div>

                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                الألوان المتاحة للمنتج </label>
                                            <select class="form-control colors" multiple="multiple" name="colors[]"
                                                value="{{ $product->color }}">
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                الاحجام المتوفرة </label>
                                            <select class="form-control colors" multiple="multiple" name="sizes[]"
                                                value="{{ $product->size }}">
                                            </select>
                                        </div>


                                    </div>


                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                            صور المنتج</label>
                                        <input class="form-control dropify" id="validationCustom05" type="file"
                                            name="images[]" multiple>
                                    </div>



                                    @foreach ($product->images as $image)
                                        <div class="col-md-3">
                                            <img src="{{ asset($image->image) }}" alt="" class="img-fluid">
                                            <a href="{{ route('dashboard.products.deleteImage', $image->id) }}"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    @endforeach

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
    </div>
@endsection


@push('javascripts')
    <script>
        $(".colors").select2({
            tags: true
        });
    </script>
@endpush
