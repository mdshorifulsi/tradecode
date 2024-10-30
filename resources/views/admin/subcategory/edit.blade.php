@extends('admin_layouts')
@section('admin_content')
@section('title','sub-category')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="card mt-3 mb-5">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                             Edit subcategory

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('subcategory.update',$subcategory->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="mb-1">Category Name</label>
                                            <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" id="category_id" name="category_id">
                                                <option selected>Open this select Category</option>
                                                @foreach($category as $row)
                                                <option
                                                value="{{$row->id}}"
                                                	  <?php

                                        if($row->id==$subcategory->category_id)
                                            echo "selected";

                                        ?>
                                                	>{{$row->cat_name}}

                                                </option>
                                                @endforeach
                                              </select>

                                              @error('category_id')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror

                                </div>
                                <div class="form-group mb-3">
                                  <label for="exampleInputEmail1" class="form-label">sub-category Name</label>
                                  <input type="text" value="{{$subcategory->sub_category_name  }}" name="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="sub-categoy name">

                                  @error('sub_category_name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                                </div>

                                <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
                              </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

</div>

@endsection
