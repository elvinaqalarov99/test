@extends('Admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary" href="/departments/">Departments</a>
                    </div>
                    <form id="department-submit-form">
                        @csrf
                        <div class="form-group">
                            <label for="department_name">Name</label>
                            <input type="text" class="form-control" id="department_name" name="name">
                            <p id="department_name_err" class="department_err text-danger"></p>
                        </div>
                        <button type="submit" class="btn btn-primary" id="department-submit-btn">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection