@extends('admin_layouts')
@section('title','Social')
@section('admin_content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h4 class="font-weight-light text-uppercase">social</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('social.update',$social->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="mt-2 ">Facebook</label>
                                        <div class=" ">
                                            <input class="form-control"  value="{{$social->facebook }}" name="facebook" type="text"
                                            placeholder="Facebook" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="mt-2 ">Twitter</label>
                                        <div class=" ">
                                            <input class="form-control"  value="{{$social->twitter }}" name="twitter" type="text"
                                            placeholder="Twitter" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="mt-2">Youtube</label>
                                        <div class=" mb-3">
                                            <input class="form-control" id="youtube" value="{{$social->youtube }}" name="youtube" type="text"
                                            placeholder="Youtube" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="mt-2">Linkedin</label>
                                        <div class=" mb-3">
                                            <input class="form-control" id="linkedin" value="{{$social->linkedin }}" name="linkedin" type="text"
                                            placeholder="linkedin " />

                                        </div>
                                    </div>
                                </div>



                                <button type="submit" id="loginbtn" class="text-center ">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>



@endsection
