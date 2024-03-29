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
                            <div class="col-md-8">
                                <div class="card">
                        
                                    <div class="card-header">
                                        All Brands
                                    </div>
                                    <table class="table">
                                        <thead>
                                           
                                            <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">Brand Name</th>
                                            <th scope="col">Brand Image</th>
                                            <th scope="col">Created At</th>
                                             <th scope="col">Action</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            @php
                                                $num = 1
                                            @endphp
                        
                                             @foreach($brands as $brand)
                                            <tr>
                                            {{-- <td>{{ $num++ }}</td> --}}
                                            <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                            <th>{{ $brand->brand_name }}</th>
                                            <td><img src="{{ asset($brand->brand_image) }}" alt="brand image"
                                                style="height:40px; width:40px;"></td>
                                           
                                            <td>
                                            @if(!$brand->created_at)
                                            <span class="text-danger">No set date</span>
                                            @else
                                            {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                             @endif                                         
                                            </td>
                                             <td><a href="{{ url('brand/edit/'. $brand->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('brand/delete/'. $brand->id) }}" 
                                                onclick="return confirm('Are you sure you want to delete item?')"
                                                class="btn btn-danger">Delete</a></td>
                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        {{ $brands->links() }}
             </div>

        </div>

<div class="col-md-4">
    <div class="card">
    <div class="card-header">Add Brand</div>
    <div class="card-body">

    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name" aria-describedby="emailHelp">
     
    @error('brand_name')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="brand_image" aria-describedby="emailHelp">
     
    @error('brand_image')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>
</div>
    </div>
</div>

</div>
                    </div>

    </div>
 @endsection

