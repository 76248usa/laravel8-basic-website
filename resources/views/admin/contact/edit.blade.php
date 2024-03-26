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
          <div class="card-header"> Edit Contact </div>
          <div class="card-body">
          
                 
     <form action="{{ url('contact/update/'.$contact->id)  }}" method="POST" >
          @csrf 
  
  <div class="form-group">
    <label for="exampleInputEmail1">Update Contact Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $contact->address }}">

          @error('address')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Update Contact Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $contact->phone }}">

          @error('phone')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Update Contact Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $contact->email }}">

          @error('email')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

    
  <button type="submit" class="btn btn-primary">Update Contact</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

    </div>

@endsection
