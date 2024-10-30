@extends('layouts')
@section('content')
@section('title','T-code')

<div class="allProduct my-4">
    <div class="row">
        <h4>Sub Cateegory</h4>
        @foreach($subcat_product as $key => $v_subcat_product)
        <div class="col-md-3">
            <div class="card mt-3 p-1">
                <span class=" text-dark  p-1 fw-bolder">10% Off</span>

                <img src="{{asset ($v_subcat_product->thumbnail_image) }}" class="rounded bg-dark"
                    alt="..." style="height: 180px;">

                <div class="overlay">
                    <button class="btn btn-secondary btn-sm rounded-5 ">
                        <a class="text-white text-decoration-none text-center text-capitalize" href="#">
                            view Details
                        </a>
                    </button>

                </div>

                <div class="card-body">
                    <h5 class="card-title text-center">{{ $v_subcat_product->product_name }}</h4>
                        <p class="card-text text-center text-secondary">Alize Group</p>
                        <hr>
                        <p class="text-center">$380 Taka</p>
                </div>
            </div>
        </div>
        @endforeach




    </div>

</div>



@endsection
