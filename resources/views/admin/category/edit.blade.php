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
    <div class="card-header">Edit Category</div>
    <div class="card-body">

    <form action="{{ url('/category/update/'.$category->id) }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" 
    aria-describedby="emailHelp" value="{{ $category->category_name }}">
     
    @error('category_name')
         <span class="text-danger">{{ $message }}</span>
     @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Update Category</button>
</form>
</div>
    </div>
</div>

                       

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
