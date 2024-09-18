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
                <strong>Admin Role-Permission - Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('admin.role.update', $admin->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                            <input type="text" id="adminname" name="adminName" value="{{$admin->name}}" placeholder="Enter the name"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the admin name.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="adminemail" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" id="adminemail" name="adminEmail" value="{{$admin->email}}" placeholder="Enter the email"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the admin email.</small>
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="adminpass" class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" id="adminpass" name="adminPass" value="{{$admin->password}}" placeholder="Enter the password"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the admin password.</small>
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="adminrole" class="col-md-3 col-form-label">Make the person Admin</label>
                        <div class="col-md-9">
                            <input type="checkbox" id="adminrole" name="adminRole" value="1" {{ isset($admin) && $admin->role == 1 ? 'checked' : '' }} class="form-check-input">
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
    </div>

@endsection

@push('js')
@endpush
