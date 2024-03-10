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
          <div class="card-header"> Edit Slider </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('edit/update/'.$slider->id)  }}" method="POST" enctype="multipart/form-data">
          @csrf 
   <input type="hidden" name="old_image" value="{{ $slider->image }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Update Title </label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $slider->title }}">

          @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Update Description </label>
    <input type="textarea" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $slider->description }}">

          @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Update Slider Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $slider->image }}">

          @error('image')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


     <div class="form-group">
     <img src="{{ asset($slider->image) }}" style="width:400px; height:200px;" >

     </div>


     
  <button type="submit" class="btn btn-primary">Update Slider</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>

@endsection
