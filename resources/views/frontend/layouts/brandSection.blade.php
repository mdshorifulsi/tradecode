
@php
$brand=App\Models\Brand::get();

@endphp
<div class="title-box bg-warning ">
    <h2 class="text-dark  ">Our Brand</h2>
  </div>

<div class="category-product my-4">
    <div id="owl-brand" class="owl-carousel owl-theme">
        @foreach($brand as $brand)
        <div class="item">
            <div class="card mt-3 p-1">

                <img src="{{asset ($brand->brand_logo) }}" class="rounded bg-dark"
                    alt="..." style="height: 200px;">
            </div>
        </div>
        @endforeach


    </div>
</div>

