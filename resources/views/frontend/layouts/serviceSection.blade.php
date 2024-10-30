@php
$service=App\Models\Service::where('status', 1)->latest()->take(4)->get();

@endphp

<div class="feature my-4">
    <div class="title-box bg-warning ">
        <h2 class="text-dark  ">Our Service</h2>
      </div>
    <div class="row">

        @foreach($service as $key => $v_service)
        <div class="col-md-3">
            <div class="card mt-3 p-1">

                <img src="{{asset ($v_service->service_image) }}" class="rounded bg-dark" alt="..." style="height: 150px;">

            </div>
        </div>
        @endforeach



    </div>

</div>
