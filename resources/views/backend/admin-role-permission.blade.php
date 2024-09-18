@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Admin Role-Permission')

@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Admin Role-Permission - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.role.create') }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="adminname" class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" id="adminname" name="adminName" placeholder="Enter the name"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the admin name.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="adminemail" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" id="adminemail" name="adminEmail" placeholder="Enter the email"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the admin email.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="adminpass" class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" id="adminpass" name="adminPass" placeholder="Enter the password"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the admin password.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="adminrole" class="col-md-3 col-form-label">Make the person Admin</label>
                        <div class="col-md-9">
                            <input type="checkbox" id="adminrole" name="adminRole" value="1" class="form-check-input">
                            <label class="form-check-label" for="status">Admin</label>
                        </div>
                    </div>

                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <strong>Admin - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $dt)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $dt->name }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>{{ $dt->role == 1 ? 'Admin' : 'Not Admin' }}</td>

                                <td>
                                    @if ($dt->email != $admin_email)
                                        <a href="{{ url('/ourschool-admin/admin-role/edit', $dt->id) }}"
                                            class="edit btn btn-primary" type="button"
                                            data-id="{{ $dt->id }}">Edit</a>
                                        <a href="{{ url('/ourschool-admin/admin-role/delete', $dt->id) }}"
                                            class="delete btn btn-danger" type="button" data-id="{{ $dt->id }}"
                                            onclick="return confirm('Are you sure to delete this class level?')">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('js')
@endpush
