<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('emp_view')}}" class="btn btn-primary">Show Employee</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

<div class="container">
    <form method="post" action="/emp_store" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="name" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{old('name')}}">
            @if($errors->has('first_name'))
              <span class="text-danger">{{ $errors->first('first_name')}} </span>
            @endif

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="name" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{old('name')}}">
            @if($errors->has('last_name'))
              <span class="text-danger">{{ $errors->first('last_name')}} </span>
            @endif

          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Company</label>

<select name="company">
  @foreach ($company as $data )
  <option value="{{ $data->id}}" >{{ $data->name}}</option>
  @endforeach


   </select>
          </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="name" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
          @if($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email')}} </span>
        @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="name" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            @if($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone')}} </span>
          @endif
          </div>
        {{-- <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Website</label>
          <input type="name" name="website" class="form-control" id="exampleInputPassword1" value="{{old('website')}}">
          @if($errors->has('website'))
          <span class="text-danger">{{ $errors->first('website')}} </span>
        @endif
        </div> --}}

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
