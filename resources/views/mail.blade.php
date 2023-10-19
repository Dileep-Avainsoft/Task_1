<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <th><a href="{{ route('company_add')}}" class="btn btn-dark">Add Company</a>&nbsp&nbsp&nbsp
            <a href="{{ route('emp_view')}}" class="btn btn-dark">Add Employee</a>
            &nbsp&nbsp&nbsp
            <a href="" class="btn btn-dark">Send mail</a>
        </th>
        </h2>
    </x-slot>
@include('translate')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

<div class="container">
    <form method="POST" action="{{route('mailsend')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="name" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="name" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
