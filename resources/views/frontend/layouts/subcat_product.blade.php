@extends('layouts')
@section('title','T-code')
@section('content')

<div class="container ">
    <div class="sectionCat">
              <div class="title-box">
                <h2 class="text-black">Product By Category</h2>
              </div>
              <div class="row">
                  @foreach($subcat_product as $key => $v_subcat_product)
                  <div class="col-md-3 product_cart m-4">
                      <div class="card ">
                        <img class="mt-2" src="{{asset($v_subcat_product->thumbnail_image)}}" alt="">
                        <div class="over-lay">
                          <button class="btn btn-dark btn-sm rounded-5 "><a
                                class="text-white text-decoration-none text-center text-capitalize" href="#">view Details
                              </a></button>
                        </div>

                        @if($v_subcat_product->discount>0)
                        <span class="badge text-dark p-2 rounded-circle">
                          {{ $v_subcat_product->discount }}
                          @if($v_subcat_product->discount_type=='flat')
                          Tk off
                          @else
                          % off
                          @endif
                      </span>
                        @else
                        @endif


                        <div class="card-body">
                          <h5 class=" text-center">{{ $v_subcat_product->product_name }}</h5>
                          <p class="card-text text-center text-secondary">
                              {{ $v_subcat_product->brand->brand_name }}
                          </p>
                          <hr>
                          <p class="text-center">{{ $v_subcat_product->selling_price }} Tk</p>

                        </div>
                      </div>
                    </div>
                  @endforeach
              </div>



    </div>
</div>



@endsection
