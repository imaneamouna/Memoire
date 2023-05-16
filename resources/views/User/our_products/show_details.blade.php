<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض التفاصيل</title>
    <link rel="stylesheet" href="{{ asset('User') }}/assets/css/style (2).css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>


    <div class="flex-box">
        <div class="left">
            <div class="big-img">
                <img src="{{ $product->image }}">
            </div>
            <div class="images">
                <div class="small-img">
                    <img src="{{ $product->image }}" alt="">
                </div>
                <div class="small-img">
                    <img src="{{ $product->images }}" onclick="showImg(this.src)" alt="">
                </div>
                <div class="small-img">
                    <img src="{{ $product->images }}" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img src="{{ $product->images }}" onclick="showImg(this.src)">
                </div>
            </div>
        </div>

        <div class="right">
            <div class="url"></div>
            <div class="pname">{{ $product->name }}</div>
            {{-- <div class="ratings">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div> --}}
            <div class="price">{{ $product->main_price }}DA</div>
            <div class="size">
                <p>Size :</p>
                <div class="psize active">{{ $product->size }}</div>
                {{-- <div class="psize">L</div>
                <div class="psize">XL</div>
                <div class="psize">XXL</div> --}}
            </div>
            <div class="quantity">
                <p>Quantity :</p>
                <input type="number" min="1" max="5" value="{{ $product->quantity }}">
            </div>
            <div class="btn-box">
                <button class="cart-btn"><a href="{{ route('order', $product->id) }}"> Add to Cart</a></button>
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
    </div>


    <script>
        let bigImg = document.querySelector('.big-img img');

        function showImg(pic) {
            bigImg.src = pic;
        }
    </script>
</body>

</html>
