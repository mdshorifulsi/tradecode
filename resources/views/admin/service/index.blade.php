@extends('admin_layouts')
@section('admin_content')
@section('title','Service')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row ">
                <div class="mt-4 shadow-none p-3 mb-3 bg-light rounded " > Service </div>

                <div class="col-md-8 mt-2">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            All service List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>service Title</th>
                                        <th>service Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($service as $key=>$row)
                                <tbody>
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{$row->service_title }}</td>
                                        <td>
                                            <img src="{{ asset($row->service_image) }}"  width="150" height="100px">
                                        </td>
                                        <td>
                                            @if($row->status==1)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>

                                            @if($row->status==1)
                                            <a href="" class="btn btn-sm btn-danger inactive " data-id="{{$row->id}}"><i class="fa-solid fa-thumbs-up"></i></a>
                                            @else
                                            <a href=""  class="btn btn-sm btn-success active" data-id="{{$row->id}}"><i class="fa-solid fa-thumbs-down"></i></a>
                                            @endif


                                                <a href="{{route('service.edit',$row->id)}}" class="btn btn-sm btn-warning ">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                            <button class="btn btn-danger" type="button" onclick="deleteservice({{ $row->id }})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                <form id="delete-form-{{$row->id}}" action="{{route('service.delete',$row->id)}}"  method="PUT" style="display: none ; " >
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col md 6">
                    <div class="card mt-2">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                             Add service
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                  <label for="exampleInputEmail1" class="form-label">service Title</label>
                                  <input type="text" name="service_title" class="form-control  @error('service_title') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="service Title">

                                  @error('service_title')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror

                                </div>

                                <div class="form-group">
                                    <label for="formFile"  class="form-label">service Image</label>


                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" class="form-control  @error('service_image') is-invalid @enderror" type="file" name="service_image" >

                                    @error('service_image')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror

                                    <img id="newImg" class="img-thumbnail mt-2" src="{{asset ('assets/backend/images/default.jpg') }}" style="width:180px">

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



<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});



    $(document).on('click','.active',function(e){
   e.preventDefault();

   let id=$(this).data('id');

    $.ajax({
        url:"{{url('/service/active')}}/"+id,
        type:"get",
        success:function(response){
            if(response.status == 'success'){
                $('.table').load(location.href+' .table')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'service Active successfully'
                });

            }
        }
    });
});




//active end

// inactive start
$(document).on('click','.inactive',function(e){
   e.preventDefault();

   let id=$(this).data('id');

    $.ajax({
        url:"{{url('/service/inactive')}}/"+id,
        type:"get",
        success:function(response){
            if(response.status == 'success'){
                $('.table').load(location.href+' .table')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'service InActive successfully'
                });
            }
        }
    });
});

// inactive end



//category delete start
   function deleteservice(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    })
    .then((result) => {
        if(result.isConfirmed) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )}
        })
}

        //category delete end


</script>
@endsection
