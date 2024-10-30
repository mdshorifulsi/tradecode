@extends('layouts')
@section('content')
@section('title','T-code')

<section class="">
    <div class="container px-2 px-lg-2 my-5">
        <div class="row gx-4 gx-lg-5 ">
            <div class="col-md-6">
                <img class="card-img-top mb-2 mb-md-0" src="{{asset ($product->thumbnail_image) }}" alt="..." /></div>
            <div class="col-md-6">
                <div class="" style="">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>{{ $product->product_name }}</strong></li>
                      <li class="list-group-item"><strong>SKU: </strong> {{ $product->product_sku }}</></li>
                      <li class="list-group-item"><strong>Brand: </strong> {{ $product->brand->brand_name }}</li>
                      <li class="list-group-item"><strong>Model: </strong> {{ $product->product_model}}</li>

                      <li class="list-group-item"><strong>Discount: </strong> {{ $product->discount}}
                        @if($product->discount_type=='flat')
                        <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i></li>
                        @else
                        % off
                        @endif


                      <li class="list-group-item"><strong>Price: </strong> {{ $product->best_price }} <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i></li>
                      <li class="list-group-item"><strong>Description: </strong> {{ $product->description}}</li>
                    </ul>
                  </div>


            </div>
        </div>
    </div>
</section>
<!-- Related items section-->





    </div>
</section>

@endsection
