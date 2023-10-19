<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('emp_create')}}" class="btn btn-primary">Add Employee</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fist Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                              </tr>

                            </thead>@foreach ($employee as $data )
                            <tbody>

                              <td>{{$data->emp_id }}</td>
                              <td>{{$data->first_name }}</th>
                              <td>{{$data->last_name }}</td>
                              <td>{{$data->company_name }}</td>
                              <td>{{$data->email }}</td>
                              <td>{{$data->phone }}</td>
                              <td><a href="emp_edit{{encrypt($data->emp_id)}}" class="btn btn-primary">Edit</a>
                                <a href="emp_delete{{encrypt($data->emp_id)}}" class="btn btn-danger">Delete</a></td>


                            </tbody>
                            @endforeach
                          </table>
                          <div class="col">

                            {{ $employee->links() }}
                          </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
