@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Teacher Login Signup Info')


@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Teacher Login Signup - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('admin.teacher-login-signup-info.create')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="teacheremail" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" id="teacheremail" name="teacherEmail"
                                placeholder="Enter the teacher email" class="form-control">
                            <small class="form-text text-muted">Please enter the teacher email.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="teacherpass" class="col-md-3 col-form-label">Paassword</label>
                        <div class="col-md-9">
                            <input type="password" id="teacherpass" name="teacherPass"
                                placeholder="Enter the teacher password" class="form-control">
                            <small class="form-text text-muted">Please enter the teacher password.</small>
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
                <strong>Teacher Info - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Email</th>
                            {{-- <th scope="col">Photo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $teacher)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{$teacher->email}}</td>
                                {{-- <td><a href="{{ url('/ourschool-admin/teacher/another/edit', $teacher['id']) }}"
                                        class="edit btn btn-primary" type="button"
                                        data-id="{{ $teacher->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/teacher/delete', $teacher['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $teacher->id }}"
                                        onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
