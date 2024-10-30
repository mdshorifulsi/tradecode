@extends('layouts')
@section('title','T-code')
@section('content')

    <div class="container mb-5">
        <div class="sectionCat">
            {{-- <div class="title-box">
                <h2 class="text-black">Product search results "{{$query}}"</h2>
            </div> --}}
            <div class="row">
                @if(count($products) > 0)
                    @foreach($products as $v_product)

                    <div class="col-md-3">
                        <div class="card mt-3 p-1">



                            @if($v_product->discount>0)
                          <span class="text-dark bg-warning p-1 fw-bolder">
                            {{ $v_product->discount }}
                            @if($v_product->discount_type=='flat')
                            <i class="fa-duotone fa-solid fa-bangladeshi-taka-sign"></i> off
                            @else
                            % off
                            @endif
                        </span>
                          @else
                          @endif


                            <img src="{{asset ($v_product->thumbnail_image) }}" class="rounded bg-dark"
                                alt="..." style="height: 180px;">

                            <div class="overlay">
                                <button class="btn btn-secondary btn-sm rounded-5 ">
                                    <a class="text-white text-decoration-none text-center text-capitalize"
                                    href="{{route('details',$v_product->id)}}">
                                        view Details
                                    </a>
                                </button>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $v_product->product_name }}</h4>
                                    <p class="card-text text-center text-secondary">{{ $v_product->brand->brand_name }}</p>
                                    <hr>
                                    <p class="text-center text-decoration-line-through d-inline mx-1">{{ $v_product->unit_price }}Taka</p>
                                    <p class="text-center fw-bolder d-inline">{{$v_product->best_price }}Taka</p>
                            </div>
                        </div>
                    </div>

                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p>No products found</p>
                            </div>
                        </div>
                    </div>
                @endif

            </div>



        </div>
    </div>



@endsection
