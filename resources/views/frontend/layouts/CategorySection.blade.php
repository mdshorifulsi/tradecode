@php
$first_category=App\Models\Category::skip(0)->first();
$v_cat_firsts=App\Models\Product::where('category_id',$first_category->id)->get();
@endphp
<div class="title-box bg-warning">
    <h2 class="text-dark ">{{ $first_category->cat_name }}</h2>
  </div>

<div class="category-product my-4">
    <div id="owl-category-product" class="owl-carousel owl-theme">
        @foreach($v_cat_firsts as $key => $v_cat_firsts)
        <div class="item">
            <div class="card mt-3 p-1">

                @if($v_cat_firsts->discount>0)
              <span class="text-dark bg-warning p-1 fw-bolder">
                {{ $v_cat_firsts->discount }}
                @if($v_cat_firsts->discount_type=='flat')
                <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i> off
                @else
                % off
                @endif
            </span>
              @else
              @endif

                <img src="{{asset ($v_cat_firsts->thumbnail_image) }}" class="rounded bg-dark"
                    alt="..." style="height: 220px;">

                <div class="overlay">
                    <button class="btn btn-secondary btn-sm rounded-5 ">
                        <a class="text-white text-decoration-none text-center text-capitalize" href="{{route('details',$v_cat_firsts->id)}}">
                            view Details
                        </a>
                    </button>

                </div>

                <div class="card-body">
                    <h5 class="card-title text-center">{{ $v_cat_firsts->product_name }}</h4>
                        <p class="card-text text-center text-secondary">{{ $v_cat_firsts->brand->brand_name }}</p>
                        <hr>
                        <p class="text-center text-decoration-line-through d-inline mx-1">{{ $v_cat_firsts->unit_price }}Taka</p>
                        <p class="text-center fw-bolder d-inline">{{$v_cat_firsts->best_price }}Taka</p>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>


@php
$second_category=App\Models\Category::skip(1)->first();
$v_cat_seconds=App\Models\Product::where('category_id',$second_category->id)->get();
@endphp
<div class="title-box bg-warning">
    <h2 class="text-dark ">{{ $second_category->cat_name }}</h2>
  </div>

<div class="category-product my-4">
    <div id="owl-category-product-2" class="owl-carousel owl-theme">
        @foreach($v_cat_seconds as $key => $v_cat_seconds)
        <div class="item">
            <div class="card mt-3 p-1">
                @if($v_cat_seconds->discount>0)
              <span class="text-dark bg-warning p-1 fw-bolder">
                {{ $v_cat_seconds->discount }}
                @if($v_cat_seconds->discount_type=='flat')
                <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i> off
                @else
                % off
                @endif
            </span>
              @else
              @endif

                <img src="{{asset ($v_cat_seconds->thumbnail_image) }}" class="rounded bg-dark"
                    alt="..." style="height: 220px;">

                <div class="overlay">
                    <button class="btn btn-secondary btn-sm rounded-5 ">
                        <a class="text-white text-decoration-none text-center text-capitalize" href="{{route('details',$v_cat_seconds->id)}}">
                            view Details
                        </a>
                    </button>

                </div>

                <div class="card-body">
                    <h5 class="card-title text-center">{{ $v_cat_seconds->product_name }}</h4>
                        <p class="card-text text-center text-secondary">{{ $v_cat_seconds->brand->brand_name }}</p>
                        <hr>

                            <p class="text-center text-decoration-line-through d-inline mx-1">{{ $v_cat_seconds->unit_price }} Taka</p>
                            <p class="text-center fw-bolder d-inline">{{$v_cat_seconds->best_price }} Taka</p>


                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>



@php
$three_category=App\Models\Category::skip(2)->first();
$v_cat_threes=App\Models\Product::where('category_id',$three_category->id)->get();
@endphp
<div class="title-box bg-warning">
    <h2 class="text-dark ">{{ $three_category->cat_name }}</h2>
  </div>

<div class="category-product my-4">
    <div id="owl-category-product-3" class="owl-carousel owl-theme">
        @foreach($v_cat_threes as $key => $v_cat_threes)
        <div class="item">
            <div class="card mt-3 p-1">

                @if($v_cat_threes->discount>0)
              <span class="text-dark bg-warning p-1 fw-bolder">
                {{ $v_cat_threes->discount }}
                @if($v_cat_threes->discount_type=='flat')
                <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i> off
                @else
                % off
                @endif
            </span>
              @else
              @endif

                <img src="{{asset ($v_cat_threes->thumbnail_image) }}" class="rounded bg-dark"
                    alt="..." style="height: 220px;">

                <div class="overlay">
                    <button class="btn btn-secondary btn-sm rounded-5 ">
                        <a class="text-white text-decoration-none text-center text-capitalize" href="{{route('details',$v_cat_threes->id)}}">
                            view Details
                        </a>
                    </button>

                </div>

                <div class="card-body">
                    <h5 class="card-title text-center">{{ $v_cat_threes->product_name }}</h4>
                        <p class="card-text text-center text-secondary">{{ $v_cat_threes->brand->brand_name }}</p>
                        <hr>
                        <p class="text-center text-decoration-line-through d-inline mx-1">{{ $v_cat_threes->unit_price }}Taka</p>
                        <p class="text-center fw-bolder d-inline">{{$v_cat_threes->best_price }}Taka</p>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
@php
$four_category=App\Models\Category::skip(3)->first();
$v_cat_fours=App\Models\Product::where('category_id',$four_category->id)->get();
@endphp
<div class="title-box bg-warning">
    <h2 class="text-dark ">{{ $four_category->cat_name }}</h2>
  </div>

<div class="category-product my-4">
    <div id="owl-category-product-3" class="owl-carousel owl-theme">
        @foreach($v_cat_fours as $key => $v_cat_fours)
        <div class="item">
            <div class="card mt-3 p-1">

                @if($v_cat_fours->discount>0)
              <span class="text-dark bg-warning p-1 fw-bolder">
                {{ $v_cat_fours->discount }}
                @if($v_cat_fours->discount_type=='flat')
                <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i> off
                @else
                % off
                @endif
            </span>
              @else
              @endif

                <img src="{{asset ($v_cat_fours->thumbnail_image) }}" class="rounded bg-dark"
                    alt="..." style="height: 220px;">

                <div class="overlay">
                    <button class="btn btn-secondary btn-sm rounded-5 ">
                        <a class="text-white text-decoration-none text-center text-capitalize" href="{{route('details',$v_cat_fours->id)}}">
                            view Details
                        </a>
                    </button>

                </div>

                <div class="card-body">
                    <h5 class="card-title text-center">{{ $v_cat_fours->product_name }}</h4>
                        <p class="card-text text-center text-secondary">{{ $v_cat_fours->brand->brand_name }}</p>
                        <hr>
                        <p class="text-center text-decoration-line-through d-inline mx-1">{{ $v_cat_fours->unit_price }}Taka</p>
                        <p class="text-center fw-bolder d-inline">{{$v_cat_fours->best_price }}Taka</p>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
@php
$five_category=App\Models\Category::skip(4)->first();
$v_cat_fives=App\Models\Product::where('category_id',$five_category->id)->get();
@endphp
<div class="title-box bg-warning">
    <h2 class="text-dark ">{{ $five_category->cat_name }}</h2>
  </div>

<div class="category-product my-4">
    <div id="owl-category-product-4" class="owl-carousel owl-theme">
        @foreach($v_cat_fives as $key => $v_cat_fives)
        <div class="item">
            <div class="card mt-3 p-1">

                @if($v_cat_fives->discount>0)
              <span class="text-dark bg-warning p-1 fw-bolder">
                {{ $v_cat_fives->discount }}
                @if($v_cat_fives->discount_type=='flat')
                <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i> off
                @else
                % off
                @endif
            </span>
              @else
              @endif

                <img src="{{asset ($v_cat_fives->thumbnail_image) }}" class="rounded bg-dark"
                    alt="..." style="height: 220px;">

                <div class="overlay">
                    <button class="btn btn-secondary btn-sm rounded-5 ">
                        <a class="text-white text-decoration-none text-center text-capitalize" href="{{route('details',$v_cat_fives->id)}}">
                            view Details
                        </a>
                    </button>

                </div>

                <div class="card-body">
                    <h5 class="card-title text-center">{{ $v_cat_fives->product_name }}</h4>
                        <p class="card-text text-center text-secondary">{{ $v_cat_fives->brand->brand_name }}</p>
                        <hr>
                        <p class="text-center text-decoration-line-through d-inline mx-1">{{ $v_cat_fives->unit_price }}Taka</p>
                        <p class="text-center fw-bolder d-inline">{{$v_cat_fives->best_price }}Taka</p>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>

