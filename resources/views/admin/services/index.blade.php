<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Services
            
        </h2>
    </x-slot>

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
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        All 
                                    </div>
                                    <table class="table">
                                        <thead>
                                           
                                            <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">Sercvice Name</th>
                                            <th scope="col">Main Title</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Created At</th>
                                             <th scope="col">Action</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            @php
                                                $num = 1
                                            @endphp
                        
                                             @foreach($services as $service)
                                            <tr>
                                            <td>{{ $num++ }}</td>
                                            {{-- <th scope="row">{{ $categories->firstItem()+$loop->index }}</th> --}}
                                            <th>{{ $service->main_title }}</th>
                                             <th>{{ $service->title }}</th>
                                              <th>{{ $service->desc }}</th>
                                              <th>{{ $service->icon }}</th>
                                           
                                           
                                            <td>
                                            @if(!$service->created_at)
                                            <span class="text-danger">No set date</span>
                                            @else
                                            {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
                                             @endif                                         
                                            </td>
                                             <td><a href="{{ url('/service/edit/'. $service->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('/service/delete/'. $service->id) }}" class="btn btn-danger">Delete</a></td>
                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        {{-- {{ $categories->links() }} --}}
             </div>
        </div>

<div class="col-md-4">
    <div class="card">
    <div class="card-header">Add Service</div>
    <div class="card-body">

    <form action="{{ route('store.service') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Main Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="main_title" aria-describedby="emailHelp">
     
    @error('main_title')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
     
    @error('title')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="desc" aria-describedby="emailHelp">
     
    @error('desc')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Icon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="icon" aria-describedby="emailHelp">
     
    @error('icon')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Add Service</button>
</form>
</div>
    </div>
</div>

</div>
                    </div>


{{-- TRASH  --}}
                    {{-- <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                   
                                    <div class="card-header">
                                        Trash List
                                    </div>
                                    <table class="table">
                                        <thead>
                                           
                                            <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Created At</th>
                                             <th scope="col">Action</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            @php
                                                $num = 1
                                            @endphp
                        
                                             @foreach($trashCat as $category)
                                            <tr>
                                            <td>{{ $num++ }}</td>
                                            <th scope="row">{{ $category->category_name }}</th>
                                            <th>{{ $category->category_name }}</th>
                                            <td>{{ $category->user->name }}</td>
                                           
                                            <td>
                                            @if(!$category->created_at)
                                            <span class="text-danger">No set date</span>
                                            @else
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                             @endif                                         
                                            </td>
                                             <td><a href="{{ url('category/restore/'. $category->id) }}" class="btn btn-info">Restore</a>
                                            <a href="" class="btn btn-danger">Final Trash</a></td>
                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        {{ $trashCat->links() }}
             </div>

        </div>

<div class="col-md-4">
   
</div>

                       

</div>
                    </div>  --}}



                </div>
            </div>
        </div>
        {{-- End trash --}}
    </div>
</x-app-layout>
