@extends('admin.admin_master')

@section('admin')

@if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
    <div class="py-12"> 
   <div class="container">
    <div class="row">

 


    <div class="col-md-8">
     <div class="card">
          <div class="card-header"> Edit Brand </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('brand/update/'.$brand->id)  }}" method="POST" enctype="multipart/form-data">
          @csrf 
   <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Update Brand Name</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}">

          @error('brand_name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Update Brand Image</label>
    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_image }}">

          @error('brand_image')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


     <div class="form-group">
     <img src="{{ asset($brand->brand_image) }}" style="width:400px; height:200px;" >

     </div>


     
  <button type="submit" class="btn btn-primary">Update Brand</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>

@endsection
