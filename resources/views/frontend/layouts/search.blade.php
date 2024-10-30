@extends('layouts');
@section('content');
@section('title','T-code');





<section class="product">
    <div class="container">
      <div class="title-box">
        <h2 class="text-black">one sale</h2>
      </div>
      <div class="row">
          @foreach($searchProduct as $key => $v_product)
          <div class="col-md-3 product_cart">
              <div class="card">
                <img class="mt-2" src="{{asset($v_product->thumbnail_image)}}" alt="">
                <div class="over-lay">
                  <button class="btn btn-dark btn-sm rounded-5 "><a
                        class="text-white text-decoration-none text-center text-capitalize" href="#">view Details
                      </a></button>
                </div>

                @if($v_product->discount>0)
                <span class="badge text-dark p-2 rounded-circle">
                  {{ $v_product->discount }}
                  @if($v_product->discount_type=='flat')
                  Tk off
                  @else
                  % off
                  @endif
              </span>
                @else
                @endif


                <div class="card-body">
                  <h5 class=" text-center">{{ $v_product->product_name }}</h5>
                  <p class="card-text text-center text-secondary">
                      {{ $v_product->brand->brand_name }}
                  </p>
                  <hr>
                  <p class="text-center">{{ $v_product->selling_price }} Tk</p>

                </div>
              </div>
            </div>
          @endforeach
      </div>
    </div>

  </section>

@endsection
