@php

$slider=App\Models\Slider::where('status', 1)->latest()->take(6)->get();
@endphp


<div class="slider">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            @foreach($slider as $key => $v_slider)
            <div class=" carousel-item {{$key == 0 ? 'active' : ''}}">
                <img src="{{asset($v_slider->slider_image)}}" class="d-block w-100 rounded-2"
                    style="height: 300px;" alt="{{ $v_slider->slider_title }}">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p class="text-dark fw-bold">Some representative placeholder content for the first
                        slide.</p>
                </div> -->
            </div>
            @endforeach



        </div>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>

    </div>

</div>
