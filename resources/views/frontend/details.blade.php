@extends('layouts')
@section('content')
@section('title','T-code')

<section class="">
    <div class="container px-2 px-lg-2 my-5">
        <div class="row gx-4 gx-lg-5 ">
            <div class="col-md-6">
                <img class="card-img-top mb-2 mb-md-0" src="{{asset ($details->thumbnail_image) }}" alt="..." /></div>
            <div class="col-md-6">
                <div class="" style="">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>{{ $details->product_name }}</strong></li>
                      <li class="list-group-item"><strong>SKU: </strong> {{ $details->product_sku }}</></li>
                      <li class="list-group-item"><strong>Brand: </strong> {{ $details->brand->brand_name }}</li>
                      <li class="list-group-item"><strong>Model: </strong> {{ $details->product_model}}</li>

                      <li class="list-group-item"><strong>Discount: </strong> {{ $details->discount}}
                        @if($details->discount_type=='flat')
                        <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i></li>
                        @else
                        % off
                        @endif


                      <li class="list-group-item"><strong>Price: </strong> {{ $details->best_price }} <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i></li>
                      <li class="list-group-item"><strong>Description: </strong> {{ $details->description}}</li>
                    </ul>
                  </div>

                {{-- <h5 class=" mb-1 text-decoration-underline">Brand: {{ $details->brand->brand_name }}</h5>
                <h6 class=" mb-1 text-decoration-underline">Model: {{ $details->product_model}}</h6>
                <h4 class=" fw-bolder">{{ $details->product_name }}</h4>
                <div class="fs-5 mb-1">
                    <span class="">Discount :  {{ $details->discount }}Taka</span>
                    <span class=""> Price : {{ $details->best_price }} Tk</span>
                </div>
                <p class="">{{ $details->description }}</p> --}}
                {{-- <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="{{ $details->product_unit }} " style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

@foreach ($relatedProduct as $relatedProduct )
<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"></h5>
                <!-- Product price-->
                $40.00 - $80.00
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
        </div>
    </div>
</div>

@endforeach


    </div>
</section>

@endsection
