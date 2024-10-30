@extends('admin_layouts')
@section('admin_content')
@section('title','Service')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row justify-content-center">


                <div class="col-md-8">
                    <div class="card mt-3 mb-5">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                             Edit Service

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                  <label for="exampleInputEmail1" class="form-label">service Title</label>
                                  <input type="text" name="service_title" value="{{ $service->service_title }}" class="form-control  @error('service_title') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="service Title">

                                  @error('service_title')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror

                                </div>

                                <div class="form-group">
                                    <label for="formFile"  class="form-label">service new Image</label>
                                    <input class="form-control  @error('service_image') is-invalid @enderror" type="file" name="service_image" >

                                    @error('service_image')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror

                                    <label for="formFile"  class="form-label mt-3">service old Image</label><br>
                                    <img src="{{URL::to($service->service_image)}}"style="width: 200px;height: 150px;">
                                    <input type="hidden" name="old_image" value="{{$service->service_image}}">
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
