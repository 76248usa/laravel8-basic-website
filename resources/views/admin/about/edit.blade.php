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
          <div class="card-header"> Edit About </div>
          <div class="card-body">
          
         
         
     <form action="{{ url('about/update/'.$about->id)  }}" method="POST" enctype="multipart/form-data">
          @csrf 
   
  <div class="form-group">
    <label for="exampleInputEmail1">Update About Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $about->title }}">

          @error('title')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Update About Short Description</label>
    <input type="text" name="short_desc" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $about->short_desc }}">

          @error('short_desc')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Update About Long Description</label>
    <input type="text" name="long_desc" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $about->long_desc }}">

          @error('long_desc')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <button type="submit" class="btn btn-primary">Update About</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>

@endsection

