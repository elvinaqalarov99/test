@extends('Admin.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary" href="/employees/create">Add</a>
                    </div>
                    <div class="overflow-x">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Middle</th>
                                    <th>Gender</th>
                                    <th>Salary</th>
                                    <th>Departments</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->surname }}</td>
                                        <td>{{ $employee->middle_name }}</td>
                                        <td>{{ $employee->gender }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>
                                            @foreach ($employee->departments as $key=>$department)
                                                @if ($key == count($employee->departments)-1)
                                                    {{ $department->name }}   
                                                @else
                                                    {{ $department->name }},
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <i class="fa fa-times mr-3 pointer text-danger pointer" onclick="deleteConfirmation({{ $employee->id }},'employees')"></i>
                                            <a href="/employees/{{ $employee->id }}/edit"><i class="fa fa-edit text-primary"></i></a>    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection