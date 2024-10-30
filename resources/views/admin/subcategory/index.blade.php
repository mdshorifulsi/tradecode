@extends('admin_layouts')
@section('admin_content')
@section('title','sub-category')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="mt-4 shadow-none p-3 mb-3 bg-light rounded " > sub-category

            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            All sub-category List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($subcategory as $key=>$row)
                                <tbody>
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{$row->category->cat_name }}</td>
                                        <td>{{$row->sub_category_name }}</td>

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

                                               <a href="{{route('subcategory.edit',$row->id)}}" class="btn btn-sm btn-warning ">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                               <button class="btn btn-danger" type="button" onclick="deletesubcategory({{ $row->id }})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                 <form id="delete-form-{{$row->id}}" action="{{route('subcategory.delete',$row->id)}}"  method="PUT" style="display: none ; " >
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
                <div class="col-md-4">
                    <div class="col md 6">
                        <div class="card mt-1">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Add subcategory



                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="mb-1">Category Name</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" id="category_id" name="category_id" >
                                            <option selected>Open this select Category</option>
                                            @foreach($category as $row)
                                            <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                      <label for="exampleInputEmail1" class="form-label">sub-category Name</label>
                                      <input type="text" name="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="sub-categoy name">
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
        url:"{{url('/subcategory/active')}}/"+id,
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
                    title: 'subcategory Active successfully'
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
        url:"{{url('/subcategory/inactive')}}/"+id,
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
                    title: 'subcategory InActive successfully'
                });
            }
        }
    });
});

// inactive end



//category delete start
   function deletesubcategory(id){
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
