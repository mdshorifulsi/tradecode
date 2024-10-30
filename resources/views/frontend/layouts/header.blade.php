@php
    $setting=App\Models\Setting::first();

    @endphp
<div class="row top-nav-bar ">

<div class="col md-3 m-2 ">
    <div class="logo-bar">
        <a href="{{ route('homePage') }}">
        <img src="{{ asset($setting->logo) }}" class="logo" alt="">
        </a>
    </div>

</div>

<div class="col-md-6 mt-3">
    <form action="{{route('search.result')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="input-group">
        <i class="fa-solid fa-bars" id="menu-btn" onclick="openMenu()"></i>
                <i class="fa-solid fa-times" id="close-btn" onclick="closeMenu()"></i>
        <input type="search" id="search" name="search" class="form-control" placeholder="Search for products" aria-label="Search" aria-describedby="search-addon" />

        <button type="submit" class="input-group-text bg-warning"><i class="fa-solid fa-magnifying-glass"></i></button>

        <div id="search-results" style="position: absolute; width: 100%; background: white; z-index: 1000; top:45px">
      </div>

    </form>

    </div>
</div>


<div class="col-md-3">
    <div class="menu-bar">
        <ul >
            {{-- <li><a href="{{ route('contact') }}"><i class="fa-solid fa-file-signature"></i> Contact</a></li> --}}
            <li class="bg-white"><a class="fs-5" href=""> <i class="fa-solid fa-phone"></i> {{ ($setting->projectPhone) }}</a></li>
            <!-- <li><a href="">Sign out</a></li> -->
        </ul>
    </div>
</div>



{{-- <div class="col md-3">
    <div class="logo-bar">
        <img src="{{ asset($setting->logo) }}" class="logo" alt="">
    </div>
</div>
<form action="{{route('search.result')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="col-md-5">
    <input type="search" id="search" name="search" class="form-control" placeholder="I'm looking for ...">
    <button type="submit" class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
<div id="search-results" style="position: absolute; width: 60%; background: white; z-index: 1000;">
</div>
</form> --}}

{{-- <div class="col-md-4">
    <div class="menu-bar">
        <ul>
            <!-- <li><a href="#"><i class="fa-solid fa-basket-shopping"></i>Cart</a></li> -->
            <li><a href=""> <i class="fa-regular fa-user"></i> Sign in</a></li>
            <!-- <li><a href="">Sign out</a></li> -->
        </ul>
    </div>

</div> --}}


</div>



<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: { query: query },
                    success: function(data) {
                        let searchResults = $('#search-results');
                        searchResults.empty();

                        if (data.length > 0) {
                            $.each(data, function(index, product) {
                                searchResults.append(`
                                <a href="{{ url('product-show') }}/${product.id}" style="text-decoration: none;">
                                <div class="search-item" style="padding: 10px; border-bottom: 1px solid #ccc;">
                                    <img src="${product.thumbnail_image}" style="width: 50px; height: 50px;" alt="${product.product_name}">
                                    <span><a href="{{ url('product-show') }}/${product.id}" style="text-decoration: none;">${product.product_name}</a></span>
                                    <span><a href="{{ url('product-show') }}/${product.id}" style="text-decoration: none;">${product.selling_price} Taka</a></span>
                                </div>
                                </a>
                            `);
                            });
                        } else {
                            searchResults.append('<div class="search-item" style="padding: 10px;">No results found</div>');
                        }
                    }
                });
            } else {
                $('#search-results').empty();
            }
        });
    });
</script>
