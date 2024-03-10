<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
            
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
                                        All Categories
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
                        
                                             @foreach($categories as $category)
                                            <tr>
                                            {{-- <td>{{ $num++ }}</td> --}}
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <th>{{ $category->category_name }}</th>
                                            <td>{{ $category->user->name }}</td>
                                           
                                            <td>
                                            @if(!$category->created_at)
                                            <span class="text-danger">No set date</span>
                                            @else
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                             @endif                                         
                                            </td>
                                             <td><a href="{{ url('category/edit/'. $category->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('softdelete/category/'. $category->id) }}" class="btn btn-danger">Delete</a></td>
                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        {{ $categories->links() }}
             </div>

        </div>

<div class="col-md-4">
    <div class="card">
    <div class="card-header">Add Category</div>
    <div class="card-body">

    <form action="{{ route('store.category') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" aria-describedby="emailHelp">
     
    @error('category_name')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
    </div>
</div>

</div>
                    </div>


{{-- TRASH  --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    {{-- @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div> 
                                    @endif --}}
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
                    </div>

                </div>
            </div>
        </div>
        {{-- End trash --}}
    </div>
</x-app-layout>
