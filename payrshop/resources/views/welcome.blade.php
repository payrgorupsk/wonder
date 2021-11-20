@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('slick/slick.css')}}">
<link rel="stylesheet" href="{{asset('slick/slick-theme.css')}}">
<script src="{{asset('slick/slick.js')}}"></script>
@endpush
@section('main')
<div class="prc-col-md-10 prc-middlecol"  >
    <x-shop-search-cart></x-shop-search-cart>
    <div>
        <div id="hot_slider" class="hot-slider" >
            <div class="hot-product" style="width: 100%;">
                <div class="slide-img" style="width: 100%;">
                    <img style="object-fit: contain; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
                </div>
            </div>
            <div class="hot-product" style="width: 100%;">
                <div class="slide-img" style="width: 100%;">
                    <img style="object-fit: contain; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div>
        <div id="category_slider" class="category-slider">

            @foreach ($categories as $category)
            <a href="{{route('category',$category->category_slug)}}">
                <div class="product-cat text-center" style="width: 90%;">
                    <div class="cat-slide-img" >
                        <img style="border-radius:50%; width:100%;" src="{{asset($category->category_thumb)}}" alt="{{$category->category_name}}">
                    </div>
                    <div class="slide-title text-center" style="width: 100%;">
                     <h5>{{$category->category_name}}</h5>
                 </div>
             </div>
         </a>
         @endforeach

     </div>
 </div>

 <!-- flash sale div -->
 <div>
    <div class="mt-5 mb-3" style="border-bottom: 2px solid violet; margin-left: -15px; margin-right:-20px;">
        <h3 style="margin-left:15px;"><a class="product-cat-menu" href="{{route('flashsale')}}">Flash Sale</a></h3>
    </div>
    <div id="featured" class="featured-slider row">

        @foreach ($flash_sales as $flash_sale)
        <div class="prc-col-md-3 prc-col-sm-4 prc-col-xs-6 text-center">
            <div class="product-container">
                <a href="{{url('product')}}/{{$flash_sale->id}}">
                    <?php
                    $images = json_decode($flash_sale->product_image);
                    $og_price = (int)$flash_sale->price;

                    if (strpos($flash_sale->discount, 'tk') !== false) {
                        $dis_price = $og_price - (int)$flash_sale->discount;
                    }
                    else{
                        $dis_price = $og_price - ($og_price * (int)$flash_sale->discount / 100);
                    }

                    $cart = DB::table('ro_cart')->where('product_id', $flash_sale->id)->get();
                    $count = $cart->count();

                    ?>
                    <div class="product-img">
                        <img width="100%" src="{{asset('images/products')}}/{{$images[0]}}" alt="">
                    </div>
                    <div class="product-price"><p ><span>{{$dis_price." ".$flash_sale->currency}}</span> <span style="text-decoration: line-through;">{{$og_price." ".$flash_sale->currency}}</span></p></div>
                    <div class="product-name" style="font-weight: 700; font-size: 16px;">{{$flash_sale->product_name}}</div>

                    <form action="{{route('order')}}" method="POST">
                        @csrf
                        <input type="hidden" name="products[]" value="{{$flash_sale->id}}" >
                        @if($count == 0)
                        <a class="add-to-cart btn btn-warning" onclick="add_to_cart({{$flash_sale->id}})" data-id="{{$flash_sale->id}}">Add to Cart</a>
                        @endif
                        <button class="add-to-cart btn btn-success" type="submit">Buy Now</button>
                    </form>
                    <br>

                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>

<!-- new product div -->
<div>
    <div class="mt-5 mb-3" style="border-bottom: 2px solid violet; margin-left: -15px; margin-right:-20px;">
        {{-- <img style="width:100%;" src="{{asset('images/0333553_smartphone.webp')}}" alt="Smartphones"> --}}
        <h3 style="margin-left:15px;"><a class="product-cat-menu" href="#">New Products</a></h3>
    </div>
    <div id="featured" class="featured-slider row">
        @foreach ($new_products as $new_products)
        <div class="prc-col-md-3 prc-col-sm-4 prc-col-xs-6 text-center">
            <div class="product-container">
                <a href="{{url('product')}}/{{$flash_sale->id}}">
                    <?php
                    $images = json_decode($new_products->product_image);
                    $og_price = (int)$new_products->price;

                    if (strpos($new_products->discount, 'tk') !== false) {
                        $dis_price = $og_price - (int)$new_products->discount;
                    }
                    else{
                        $dis_price = $og_price - ($og_price * (int)$new_products->discount / 100);
                    }

                    $cart = DB::table('ro_cart')->where('product_id', $new_products->id)->get();
                    $count = $cart->count();

                    ?>
                    <div class="product-img">
                        <img width="100%" src="{{asset('images/products')}}/{{$images[0]}}" alt="">
                    </div>
                    <div class="product-price"><p ><span>{{$dis_price." ".$new_products->currency}}</span> <span style="text-decoration: line-through;">{{$og_price." ".$new_products->currency}}</span></p></div>
                    <div class="product-name" style="font-weight: 700; font-size: 16px;">{{$new_products->product_name}}</div>

                    <form action="{{route('order')}}" method="POST">
                        @csrf
                        <input type="hidden" name="products[]" value="{{$new_products->id}}" >
                        @if($count == 0)
                        <a class="add-to-cart btn btn-warning" onclick="add_to_cart()" data-id="{{$new_products->id}}">Add to Cart</a>
                        @endif
                        <button class="add-to-cart btn btn-success" type="submit">Buy Now</button>
                    </form>
                    <br>

                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- category div -->

@foreach($categories as $category)

<?php

$sql = "Select * from ro_products where category_id =".$category->id;

$cat_products = DB::table('ro_products')->where('category_id', $category->id)->get();

if(count($cat_products) > 0){

    ?>
    <div class="mt-5 mb-3" style="margin-left: -15px; margin-right:-20px;">
        <h3 style="margin-left:15px;"><a class="product-cat-menu" href="{{route('category','men')}}">{{$category->category_name}}</a></h3>
        <img style="width:100%; height:100px;" src="{{asset($category->category_banner)}}" alt="Men">
    </div>
    <div >
        <div class="products-slider">
            @foreach ($cat_products as $cat_product)
            <div class="prc-col-md-3 prc-col-sm-4 prc-col-xs-6 text-center">
                <div class="product-container">
                    <a href="{{url('product')}}/{{$cat_product->id}}">
                        <?php
                        $images = json_decode($cat_product->product_image);
                        $og_price = (int)$cat_product->price;

                        if (strpos($cat_product->discount, 'tk') !== false) {
                            $dis_price = $og_price - (int)$cat_product->discount;
                        }
                        else{
                            $dis_price = $og_price - ($og_price * (int)$cat_product->discount / 100);
                        }

                        $cart = DB::table('ro_cart')->where('product_id', $cat_product->id)->get();
                    $count = $cart->count();

                        ?>
                        <div class="product-img">
                            <img width="100%" src="{{asset('images/products')}}/{{$images[0]}}" alt="">
                        </div>
                        <div class="product-price"><p ><span>{{$dis_price." ".$cat_product->currency}}</span> <span style="text-decoration: line-through;">{{$og_price." ".$cat_product->currency}}</span></p></div>
                        <div class="product-name" style="font-weight: 700; font-size: 16px;">{{$cat_product->product_name}}</div>

                        <form action="{{route('order')}}" method="POST">
                            @csrf
                            <input type="hidden" name="products[]" value="{{$cat_product->id}}" >
                            @if($count == 0)
                            <a class="add-to-cart btn btn-warning" onclick="add_to_cart()" data-id="{{$cat_product->id}}">Add to Cart</a>
                            @endif
                            <button class="add-to-cart btn btn-success" type="submit">Buy Now</button>
                        </form>
                        <br>

                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<?php } ?>
@endforeach

<!-- e-shop div -->
<div>
    <div class="mt-5 mb-3" style="border-bottom: 2px solid violet; margin-left: -15px; margin-right:-20px;">
        {{-- <img style="width:100%;" src="{{asset('images/0330860_men.webp')}}" alt="All"> --}}
        <h3 style="margin-left:15px;"><a class="product-cat-menu" href="">Eshop</a></h3>
    </div>
    <div id="vendor_slider" class="vendor-slider">
        <div class="product-cat text-center" style="width: 90%;">
            <div class="cat-slide-img" >
                <img style="border-radius:50%; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
            </div>
            <div class="slide-title text-center" style="width: 100%;">
                Store One
            </div>
        </div>
        <div class="product-cat text-center" style="width: 90%;">
            <div class="cat-slide-img" >
                <img style="border-radius:50%; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
            </div>
            <div class="slide-title text-center" style="width: 100%;">
                Store Two
            </div>
        </div>
        <div class="product-cat text-center" style="width: 90%;">
            <div class="cat-slide-img" >
                <img style="border-radius:50%; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
            </div>
            <div class="slide-title text-center" style="width: 100%;">
                Store Three
            </div>
        </div>
        <div class="product-cat text-center" style="width: 90%;">
            <div class="cat-slide-img" >
                <img style="border-radius:50%; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
            </div>
            <div class="slide-title text-center" style="width: 100%;">
                Store Four
            </div>
        </div>
        <div class="product-cat text-center" style="width: 90%;">
            <div class="cat-slide-img" >
                <img style="border-radius:50%; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
            </div>
            <div class="slide-title text-center" style="width: 100%;">
                Store Five
            </div>
        </div>
        <div class="product-cat text-center" style="width: 90%;">
            <div class="cat-slide-img" >
                <img style="border-radius:50%; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
            </div>
            <div class="slide-title text-center" style="width: 100%;">
                Store Six
            </div>
        </div>
        <div class="product-cat text-center" style="width: 90%;">
            <div class="cat-slide-img" >
                <img style="border-radius:50%; width:100%;" src="{{env('HOME_URL')}}/upload/photos/2021/09/fkOWSFNXd7HoJbCPC65f_28_db4fd2275fa24fb9d047bd2bf6011549_image.jpg" alt="">
            </div>
            <div class="slide-title text-center" style="width: 100%;">
                Store Seven
            </div>
        </div>

    </div>
</div>

<!-- all product div -->
<div class="mt-5 mb-3" style="border-bottom: 2px solid violet; margin-left: -15px; margin-right:-20px;">
    {{-- <img style="width:100%;" src="{{asset('images/0330860_men.webp')}}" alt="All"> --}}
    <h3 style="margin-left:15px;"><a class="product-cat-menu" href="">All Products</a></h3>
</div>
<div >
    <div class="all-products row">
        @foreach ($all_products as $all_product)
        <div class="prc-col-md-3 prc-col-sm-4 prc-col-xs-6 text-center">
            <div class="product-container">
                <a href="{{url('product')}}/{{$flash_sale->id}}">
                    <?php
                    $images = json_decode($all_product->product_image);
                    $og_price = (int)$all_product->price;

                    if (strpos($all_product->discount, 'tk') !== false) {
                        $dis_price = $og_price - (int)$all_product->discount;
                    }
                    else{
                        $dis_price = $og_price - ($og_price * (int)$all_product->discount / 100);
                    }

                    $cart = DB::table('ro_cart')->where('product_id', $all_product->id)->get();
                    $count = $cart->count();

                    ?>
                    <div class="product-img">
                        <img width="100%" src="{{asset('images/products')}}/{{$images[0]}}" alt="">
                    </div>
                    <div class="product-price"><p ><span>{{$dis_price." ".$flash_sale->currency}}</span> <span style="text-decoration: line-through;">{{$og_price." ".$all_product->currency}}</span></p></div>
                    <div class="product-name" style="font-weight: 700; font-size: 16px;">{{$all_product->product_name}}</div>

                    <form action="{{route('order')}}" method="POST">
                        @csrf
                        <input type="hidden" name="products[]" value="{{$all_product->id}}" >
                        @if($count == 0)
                        <a class="add-to-cart btn btn-warning" onclick="add_to_cart()" data-id="{{$all_product->id}}">Add to Cart</a>
                        @endif
                        <button class="add-to-cart btn btn-success" type="submit">Buy Now</button>
                    </form>
                    <br>
                    
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection
@push('js')
<script>
    $('.hot-slider').slick({
        dots: true,
        slidesToShow: 1,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    $('.category-slider').slick({
        dots: false,
        slidesToShow: 6,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1,
            infinite: true,
            dots: true
        }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
    }
},
{
  breakpoint: 480,
  settings: {
    slidesToShow: 3,
    slidesToScroll: 1
}
}
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
    });

    $('.vendor-slider').slick({
        dots: false,
        slidesToShow: 5,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1,
            infinite: true,
            dots: true
        }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
    }
},
{
  breakpoint: 480,
  settings: {
    slidesToShow: 3,
    slidesToScroll: 1
}
}
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
    });

    $('.products-slider').slick({
      dots: false,
      infinite: true,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [
      {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
        }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
    }
},
{
  breakpoint: 480,
  settings: {
    slidesToShow: 2,
    slidesToScroll: 1
}
}
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
});
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    function add_to_cart(id)
    {
        $.ajax({
            url: "{{url('add_to_cart')}}/"+id,
            type: 'GET',

            success:function(data) {

                if(data == "success"){

                    Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Great ! <br>Product Added to cart !',
                      showConfirmButton: false,
                      timer: 1500
                  })

                }
                else{

                    Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Oops ! <br>Product Already Added !',
                      showConfirmButton: false,
                      timer: 1500
                  })


                }


            },

        });
    }
    
</script>
@endpush
