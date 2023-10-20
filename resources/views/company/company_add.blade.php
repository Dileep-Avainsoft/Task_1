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
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($company as $data )
                              <tr>
                                <th scope="row"> {{$data->id}}</th>
                                <td> {{$data->name}}</td>
                                <td> {{$data->email}}</td>
                                <td><img src="/Company_logo/{{$data->logo}}" width="100" height="100" alt=""></td>
                                <td><a href="{{$data->website}}" target="_blank">{{$data->website}}</a></td>


                                <th>
                                    <a href="/company/edit{{encrypt($data->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="/company/delete{{encrypt($data->id)}}" class="btn btn-danger">Delete</a>
                                </th>
                              </tr>
                              @endforeach
                            </tbody>

                          </table>
                          <div class="col">

                            {{ $company->links() }}
                          </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
