<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <th><a href="{{ route('company_add')}}" class="btn btn-dark">Add Company</a>&nbsp&nbsp&nbsp
            <a href="{{ route('emp_view')}}" class="btn btn-dark">Add Employee</a>
            &nbsp&nbsp&nbsp
            <a href="{{ route('mail')}}" class="btn btn-dark">Send mail</a>
            &nbsp&nbsp&nbsp
            <a href="{{ route('data_table') }}" class="btn btn-dark">Employee Data </a>
        </th>
        </h2>
    </x-slot>
@include('translate')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
