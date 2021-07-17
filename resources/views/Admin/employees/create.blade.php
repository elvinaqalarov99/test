@extends('Admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary" href="/employees/">Employees</a>
                    </div>
                    <form id="employee-submit-form">
                        @csrf
                        <div class="form-group">
                            <label for="employee_name">Name</label>
                            <input type="text" class="form-control" id="employee_name" name="name">
                            <p id="employee_name_err" class="employee_err text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="employee_surname">Surname</label>
                            <input type="text" class="form-control" id="employee_surname" name="surname">
                            <p id="employee_surname_err" class="employee_err text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="employee_midlle_name">Middle Name</label>
                            <input type="text" class="form-control" id="employee_midlle_name" name="middle_name">
                            <p id="employee_middle_name_err" class="employee_err text-danger"></p>
                        </div>
                        <label>Gender</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="Female" id="employee_gender_name">
                            <label class="form-check-label" for="employee_gender_name">Female</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="Male" id="employee_gender_name1">
                            <label class="form-check-label" for="employee_gender_name1">Male</label>
                        </div>
                        <p id="employee_gender_err" class="employee_err text-danger"></p>
                        <div class="form-group">
                            <label for="employee_salary">Salary</label>
                            <input type="number" class="form-control" id="employee_salary" name="salary">
                            <p id="employee_salary_err" class="employee_err text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="employee_departments">Departments</label>
                            <select class="form-control select2" name="departments[]" id="employee_departments" multiple="mutiple">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <p id="employee_departments_err" class="employee_err text-danger"></p>
                        </div>
                        <button type="submit" class="btn btn-primary" id="employee-submit-btn">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection