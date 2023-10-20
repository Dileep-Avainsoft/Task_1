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
{{-- @include('translate') --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <link rel="stylesheet" type="text/css" href="{{ asset('data_table/css/jquery.dataTables.css') }}"/>
                    <script type="text/javascript" src="{{ asset('data_table/js/jquery-3.6.0.min.js') }}"></script>
                    <script type="text/javascript" src="{{ asset('data_table/js/jquery.dataTables.js') }}"></script>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                <div class="container my-4">

                        <table id="datatable" class="display">
                            <thead>
                                <tr align="left">
                                    <th>Comp_ID</th>
                                    <th data-sortable="true">Company_Name</th>
                                    <th data-sortable="true">Company_Email</th>
                                    <th data-sortable="false">Company_Logo</th>
                                    <th data-sortable="false">Website</th>
                                    <th data-sortable="false">Created at</th>
                                </tr>

                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>


                <script>
                    $(document).ready(function(){
                        $('#datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            order: [[ 0, "desc" ]],
                            ajax: "{{ url('get_company_table') }}",
                            columns: [
                                { data: 'id' },
                                { data: 'name' },
                                { data: 'email' },
                                { data: 'logo', render: function(data, type, row) {
                    return '<img src="{{'Company_logo'}}/'+data+'" alt="logo" width="100">';
                } },

                                { data: 'website' },
                                { data: 'created_at' }
                            ]
                        });
                    });
                </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
