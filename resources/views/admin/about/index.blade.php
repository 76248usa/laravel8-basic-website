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
                            <div class="col-md-12">
                                <div class="card">
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        About Page
                                    </div>
                                    <table class="table">
                                        <thead>
                                           
                                            <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">About Title</th>
                                            <th scope="col">Short Description</th>
                                            <th scope="col">Long Description</th>
                                             <th scope="col">List Item1</th>
                                              <th scope="col">List Item2</th>
                                             <th scope="col">Action</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            @php
                                                $num = 1
                                            @endphp
                        
                                             @foreach($homeabout ?? '' as $about)
                                            <tr>
                                            <td>{{ $num++ }}</td>
                                            {{-- <th scope="row">{{ $homeabout ?? ''->firstItem()+$loop->index }}</th> --}}
                                            <th>{{ $about->title }}</th>
                                            <td>{{ $about->short_desc }}<td>
                                            <td>{{ $about->long_desc }}<td>
                                             <td>{{ $about->first_li }}<td>
                                             <td>{{ $about->second_li }}<td>
                                            @if(!$about->created_at)
                                            <span class="text-danger">No set date</span>
                                            @else
                                            {{ Carbon\Carbon::parse($about->created_at)->diffForHumans() }}
                                             @endif                                         
                                            </td>
                                             <td><a href="{{ url('about/edit/'. $about->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete/'. $about->id) }}" 
                                                onclick="return confirm('Are you sure you want to delete item?')"
                                                class="btn btn-danger">Delete</a></td>
                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        {{-- {{ $brands->links() }} --}}
             </div>

        </div>

<div class="col-md-8">
    <div class="card">
    <div class="card-header">Add About</div>
    <div class="card-body">

    <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">About Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
     
    @error('title')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Short Description</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="short_desc" aria-describedby="emailHelp">
     
    @error('short_desc')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Long Description</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="long_desc" aria-describedby="emailHelp">
     
    @error('long_desc')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">List 1</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="first_li" aria-describedby="emailHelp">
     
    @error('first_li')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">List 2</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="second_li" aria-describedby="emailHelp">
     
    @error('second_li')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>


  <button type="submit" class="btn btn-primary">Add About</button>
</form>
</div>
    </div>
</div>

</div>
                    </div>

    </div>
 @endsection

