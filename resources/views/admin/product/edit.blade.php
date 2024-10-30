@extends('admin_layouts')
@section('admin_content')
@section('title','Edit-product')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="mt-4 shadow-none p-3 mb-3 bg-light rounded " > Edit Product
                <a id="catbtn" href="{{route('product.index')}}" class="btn btn-sm btn-success ">
                    Back to Product
                </a>
            </div>

            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Product Information
                        </div>
                        <div class="card-body">
                            <div class="form-group m-1">
                                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control @error('product_name') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="Product name">

                                @error('product_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                            </div>
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group m-1">
                                        <label for="exampleFormControlInput1" class="mb-1">Category Name</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">

                                            @foreach($category as $row)
                                            <option value="{{$row->id}}"
                                            <?php
                                                if($row->id==$product->category_id)
                                                    echo "selected"
                                            ?>
                                                >
                                                {{$row->cat_name}}</option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group m-1">
                                        <label for="exampleFormControlInput1" class="mb-1">sub-category Name</label>

                                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subcategory_id">
                                            <option selected="" disabled="" id="">Subcategorychoose</option>
                                            @foreach($subcategory as $row)
                                            <option value="{{$row->id}}"
                                            <?php
                                                if($row->id==$product->subcategory_id)
                                                    echo "selected"
                                            ?>
                                            >
                                            {{$row->sub_category_name}}</option>
                                            @endforeach
                                        </select>

                                        @error('subcategory_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                    </div>
                                </div>

                            </div>

                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group m-1">
                                        <label for="exampleFormControlInput1" class="mb-1">Brand Name</label>
                                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                                            <option> >> Select Brand Name...</option>
                                            @foreach($brand as $row)
                                            <option value="{{$row->id}}"
                                                <?php
                                                if($row->id==$product->brand_id)
                                                    echo "selected"
                                                ?>
                                                >{{$row->brand_name}}</option>
                                            @endforeach
                                        </select>

                                        @error('brand_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group m-1">
                                        <label for="exampleInputEmail1" class="form-label">Product model</label>
                                        <input type="text" name="product_model" value="{{ $product->product_model }}" class="form-control @error('product_model') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="Product model">

                                        @error('product_model')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                            </div>
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group m-1">
                                        <label for="exampleInputEmail1" class="form-label">Product SKU</label>
                                        <input type="text" name="product_sku" value="{{ $product->product_sku }}" class="form-control @error('product_sku') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="Product SKU">

                                        @error('product_sku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group m-1">
                                        <label for="exampleInputEmail1" class="form-label">Stock Quantity</label>
                                        <input type="text" name="stock_quantity" value="{{ $product->stock_quantity }}" class="form-control @error('stock_quantity') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="Stock Quantity">

                                        @error('stock_quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>


                    <div class="card mt-3 ">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Product price and Stock
                        </div>
                        <div class="card-body">


                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group m-1">
                                            <label for="exampleInputEmail1" class="form-label ">unit price</label>
                                            <input type="text" name="unit_price" value="{{ $product->unit_price }}" class="form-control @error('unit_price') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="Unit price">

                                            @error('unit_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group m-1">
                                            <label for="exampleInputEmail1" class="form-label">Product Unit</label>
                                            <input type="number" name="product_unit" value="{{ $product->product_unit }}" class="form-control @error('product_unit') is-invalid @enderror" min="1"  aria-describedby="emailHelp" placeholder="Product Unit ">

                                            @error('product_unit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        </div>
                                    </div>




                                </div>

                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group m-1">
                                            <label for="exampleInputEmail1" class="form-label">Discount</label>
                                            <input type="text" name="discount" value="{{ $product->discount }}" class="form-control @error('discount') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="Discount">

                                            @error('discount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        </div>
                                    </div>
                                <div class="col-md-6 ">

                                    <div class="form-group m-1">
                                        <label for="exampleFormControlInput1" class="mb-1">Discount Type</label>
                                        <select class="form-select @error('discount_type') is-invalid @enderror" aria-label="Default select example" id="discount_type" name="discount_type">
                                            <option selected>Discount type</option>

                                            <option {{ ($product->discount_type=='percent')?'selected':'' }} value="percent">Percent</option>
                                            <option {{ ($product->discount_type=='flat')?'selected':'' }} value="flat">Flat</option>

                                        </select>

                                        @error('discount_type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>




                            </div>


                        </div>

                      </div>


                <div class="col-md-4">
                    <div class="col md 6">
                        <div class="card mt-1">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Image
                            </div>
                            <div class="card-body">

                                    <div class="form-group">
                                        <label class="d-block text-center mb-2">Old Image</label>
                                       <img src="{{URL::to($product->thumbnail_image)}}"style="width: 200px;height: 150px;">
                                       <input type="hidden" name="old_image" value="{{$product->thumbnail_image}}">
                                       <input type="file" class="form-control mt-2 @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image">

                                       @error('thumbnail_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                    </div>

                                    <hr>
                            </div>
                        </div>

                    </div>
                    <div class="col md 6">
                        <div class="card mt-3">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Deal and Offer
                            </div>
                            <div class="card-body">



                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status" value="1" {{  ($product->status == 1 ? ' checked' : '') }} id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            status
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="today_deal" value="1"  {{  ($product->today_deal == 1 ? ' checked' : '') }} id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            today_deal
                                        </label>
                                      </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row mt-3 mb-5">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Product Description
                        </div>
                        <div class="card-body">
                            <div class="form-group">

                                <textarea class="form-control" rows="3" name="description" placeholder="Product Descriptions">{{ $product->description }}</textarea>
                            </div>




                        </div>

                    </div>



            </div>


            <div class="col-md-12 ">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>

            </div>

        </form>

            </div>


    </main>

</div>

<script src="{{ asset('assets/backend/js/jquery-3.7.0.min.js') }}"></script>


{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}

<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});



    $(document).ready(function(){


$('select[name="category_id"]').on('change',function(){
    var category_id=$(this).val();

    if(category_id){
        $.ajax({
            url:"{{url('/get/subcategory')}}/"+category_id,
            type:"GET",
            dataType:"json",
            success:function(data){
                // console.log(data);
                $("#subcategory_id").empty();
                $.each(data,function(key,value){
                    $("#subcategory_id").append('<option value="'+value.id+'">'+value.sub_category_name+ ' </option>');

                })
            },

        });

        }else{
         alert('danger');
        }

});

});



</script>

@endsection
