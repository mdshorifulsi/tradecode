@extends('layouts')
@section('content')
@section('title','T-code')

    @include('frontend/layouts/sliderSection')
    @include('frontend/layouts/serviceSection')
    @include('frontend/layouts/productSection')
    @include('frontend/layouts/CategorySection')
    @include('frontend/layouts/BrandSection')



    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}


  @php
    $bestOffer=App\Models\BestOffer::first();

    @endphp


@if($bestOffer->status==1)
  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body">
            <div class="text-end">
                <button type="button" class="btn-close float-left" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <img  class="img-thumbnail" src="{{asset ($bestOffer->best_offer_image) }}" style="width:100%; height:300px">
        </div>





      </div>
    </div>
  </div>


  {{-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a> --}}
@else
@endif


  <script>
$(window).on('load',function(){

    $('#exampleModal').modal('show');
})

  </script>


@endsection
