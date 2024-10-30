@php

$category=App\Models\Category::where('status', 1)->take(7)->get();
@endphp

<div class="side_menu " id="side_menu">

    <div class="card-category border border-1 rounded-3">
        <div class="card-header bg-warning text-uppercase fs-4 ">
            <i class=" mx-2 fa-solid fa-list"></i> Category
        </div>
        <ul class="list-group list-group-flush">

            @foreach($category as $key => $v_category)
            @php
            $subCategory=App\Models\SubCategory::where('category_id',$v_category->id)->get();
            @endphp

            <li class="list-group-item"><a class="text-decoration-none text-dark text fw-normal"
                    href="#">
                    {{ $v_category->cat_name }}
                     <i class="fa-solid fa-angle-right"></i></a>
                <ul>
                    @foreach($subCategory as $key => $v_sub_category)
                    <li class="list-group-item"><a class="text-decoration-none text-dark fw-normal"
                            href="{{URL::to('subCatProduct/'.$v_sub_category->id)}}">
                            {{ $v_sub_category->sub_category_name }}
                        </a>
                    </li>
                    @endforeach


                </ul>
            </li>

            @endforeach

        </ul>
    </div>

</div>
