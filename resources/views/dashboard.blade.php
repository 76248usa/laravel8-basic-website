<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <h5>Hello {{ Auth::user()->name }}, you're logged in!</h5>
                    {{-- <b style="float:right;">Total Users: {{ count($users) }}</span> 
                       
                       </b> --}}
                    <div class="container">
                        <div class="row">

                        <table class="table">
  <thead>
    <tr>
      <th scope="col">SL Number</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i = 1;
    @endphp
    @foreach($users as $user)
    <tr>
        
      <th scope="row">{{$i++ }}</th>
      <td> {{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
    </tr>
    @endforeach
   
  </tbody>
</table>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
