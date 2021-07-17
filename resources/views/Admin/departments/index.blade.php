@extends('Admin.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary" href="/departments/create">Add</a>
                    </div>
                    <div class="overflow-x">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>No. of employees</th>
                                    <th>Max salary</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td><a href="/departments/{{ $department->id }}/edit">{{ $department->id }}</a></td>
                                        <td><a href="/departments/{{ $department->id }}/edit">{{ $department->name }}</a></td>
                                        <td>{{ $department->employees->count() }}</td>
                                        <td>{{ $department->employees->max('salary') }}</td>
                                        <td>
                                            @if ($department->employees()->count() === 0)
                                                <i class="fa fa-times text-danger pointer mr-3" onclick="deleteConfirmation({{ $department->id }},'departments')"></i>    
                                            @endif
                                            <a href="/departments/{{ $department->id }}/edit"><i class="fa fa-edit text-primary"></i></a>    
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