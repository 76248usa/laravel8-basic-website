@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <b style="float:right;">All Categories </span>  --}}                      
                       </b>

                    <div class="container">
                        <div class="row">
                            <h4>Home Slider </h4>
                            <a href="{{ route('add.slider') }}">
                                <br><br>
                                <button class="btn btn-info">Add Slider </button>
                            </a>
                            <div class="col-md-12">
                                <div class="card">
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        Sliders
                                    </div>
                                    <table class="table">
                                        <thead>
                                           
                                            <tr>
                                            <th scope="col" width="5%">SL No</th>
                                            <th scope="col" width="15%">Slider Title</th>
                                            <th scope="col" width="25%">Description</th>
                                            <th scope="col" width="15%">Image</th>
                                            <th scope="col" width="15%">Created At</th>
                                             <th scope="col" width="15%">Action</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            @php
                                                $num = 1
                                            @endphp
                        
                                             @foreach($sliders as $slider)
                                            <tr>
                                            <td>{{ $num++ }}</td>
                                            {{-- <th scope="row">{{ $sliders->firstItem()+$loop->index }}</th> --}}
                                            <th>{{ $slider->title }}</th>
                                             <th>{{ $slider->description }}</th>
                                            <td><img src="{{ asset($slider->image) }}" alt="brand image"
                                                style="height:40px; width:40px;"></td>
                                           
                                             <td><a href="{{ url('slider/edit/'. $slider->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete/'. $slider->id) }}" 
                                                onclick="return confirm('Are you sure you want to delete item?')"
                                                class="btn btn-danger">Delete</a></td>
                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                       
             </div>

        </div>

{{-- <div class="col-md-4">
    <div class="card">
    <div class="card-header">Add Slider</div>
    <div class="card-body">

    <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Slider Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name" aria-describedby="emailHelp">
     
    @error('name')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Slider Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="brand_image" aria-describedby="emailHelp">
     
    @error('image')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Add Slider</button>
</form>
</div>
    </div>
</div> --}}

</div>
                    </div>

    </div>
 @endsection

