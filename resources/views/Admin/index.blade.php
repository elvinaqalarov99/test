@extends('Admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="overflow-x">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> </th>
                                    @foreach ($departments as $department)
                                        <th>{{ $department->name }}</th>    
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }} {{ $employee->surname }}</td>
                                        @foreach ($departments as $department)
                                            @if (in_array($department->id,$employee->getDepartmentIds()))
                                                <td><i class="fas fa-check"></i></td>
                                            @else
                                                <td> </td>
                                            @endif
                                        @endforeach
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