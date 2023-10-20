<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <th><a href="{{ route('company_add')}}" class="btn btn-dark">Add Company</a>&nbsp&nbsp&nbsp
            <a href="{{ route('emp_view')}}" class="btn btn-dark">Add Employee</a>
            &nbsp&nbsp&nbsp
            <a href="{{ route('mail')}}" class="btn btn-dark">Send mail</a>
            &nbsp&nbsp&nbsp
            <a href="{{ route('emp_table') }}" class="btn btn-dark">Employee Data Table</a>

             <a href="{{ route('company_table') }}" class="btn btn-dark">Company Data Table</a>
        </th>
        </h2>
    </x-slot>
    @include('translate')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

<div class="container">
    <form method="post" action="{{route('mailsend')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{old('name')}}">
            @if($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name')}} </span>
            @endif

          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="name" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
          @if($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email')}} </span>
        @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">logo</label>
            <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            @if($errors->has('logo'))
            <span class="text-danger">{{ $errors->first('logo')}} </span>
          @endif
          </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Website</label>
          <input type="name" name="website" class="form-control" id="exampleInputPassword1" value="{{old('website')}}">
          @if($errors->has('website'))
          <span class="text-danger">{{ $errors->first('website')}} </span>
        @endif
        </div>

        <button type="submit" class="btn btn-primary">Send Mail</button>
      </form>
</div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
