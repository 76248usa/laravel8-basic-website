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
          <div class="card-header"> Edit Service </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('service/update/'.$service->id)  }}" method="POST" enctype="multipart/form-data">
          @csrf 
   
  <div class="form-group">
    <label for="exampleInputEmail1">Update Service Main Title</label>
    <input type="text" name="main_title" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $service->main_title }}">

          @error('main_title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Update Service Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $service->title }}">

          @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Update Service Description</label>
    <input type="text" name="desc" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $service->desc }}">

          @error('desc')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Update Icon</label>
    <input type="text" name="icon" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $service->icon }}">

          @error('icon')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <button type="submit" class="btn btn-primary">Update Service</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>

@endsection

