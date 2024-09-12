@extends('backend.layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Teacher Info - Form (1)</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('admin.teacher.another.create') }}" method="post" enctype="multipart/form-data"
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
                    <label for="teacheraccount" class="col-md-3 col-form-label">Email Account</label>
                    <div class="col-md-9">
                        <select id="teacheraccount" name="teacherAccount" class="form-control">
                            <option value="" disabled selected>Select the email</option>
                            @foreach ($teacheraccount as $acc)
                                <option value="{{ $acc->id }}">
                                    {{ $acc->email }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Please select the email of the teacher.</small>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="teachername" class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9">
                        <input type="text" id="teachername" name="teacherName" placeholder="Enter the teacher name"
                            class="form-control">
                        <small class="form-text text-muted">Please enter the teacher name.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherposition" class="col-md-3 col-form-label">Designation/Position</label>
                    <div class="col-md-9">
                        <input type="text" id="teacherposition" name="teacherPosition"
                            placeholder="Enter the teacher Position" class="form-control">
                        <small class="form-text text-muted">Please enter the teacher position.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contact-info" class="col-md-3 col-form-label">Contact Info</label>
                    <div class="col-md-9">
                        <textarea name="teacherContact" id="contact-info" rows="7" placeholder="Enter the contact information"
                            class="editor form-control"></textarea>
                        <small class="form-text text-muted">Please enter the teacher contact info</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherexperienceyear" class="col-md-3 col-form-label">Years of Experience</label>
                    <div class="col-md-9">
                        <input type="number" id="teacherexperienceyear" name="teacherYearExp"
                            placeholder="Enter the years of Experience " class="form-control">
                        <small class="form-text text-muted">Please enter the teacher years of Experience.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="education-qualification" class="col-md-3 col-form-label">Educational
                        Qualification</label>
                    <div class="col-md-9">
                        <textarea name="teacherEducation" id="education-qualification" rows="30"
                            placeholder="Enter the educational qualification" class="editor form-control"></textarea>
                        <small class="form-text text-muted">Please enter the teacher educational qualification</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherteachingsubject" class="col-md-3 col-form-label">Teaching Subjects</label>
                    <div class="col-md-9">
                        <input type="text" id="teacherteachingsubject" name="teacherTeachingSubject"
                            placeholder="Please use ',' comma to enter the multiple teaching subjects of the teacher."
                            class="form-control">
                        <small class="form-text text-muted">Please use ',' comma to enter the multiple teaching subjects
                            of the teacher.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url-input" class="col-md-3 col-form-label">Photo (Google Drive link)</label>
                    <div class="col-md-9">
                        <input type="text" id="url-input" name="teacherPhoto" placeholder="Enter the Google drive link"
                            class="form-control">
                        <small class="form-text text-muted">Please enter the Google drive link</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacheractivestatus" class="col-md-3 col-form-label">Publish Status</label>
                    <div class="col-md-9">
                        <input type="checkbox" id="teacheractivestatus" name="teacherStatus" value="1"
                            class="form-check-input">
                        <label class="form-check-label" for="status">Active</label>
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
                        <th scope="col">Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $teacher)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $teacher->name }}</td>
                            <td><img src="https://drive.google.com/thumbnail?id={{ $teacher->photo_link }}"
                                    alt="{{ $teacher->name }}"></td>
                            </td>
                            <td>
                                @if ($teacher->active_status)
                                    Published
                                @else
                                    Unpublished
                                @endif
                            </td>
                            <td><a href="{{ url('/ourschool-admin/teacher/another/edit', $teacher['id']) }}"
                                    class="edit btn btn-primary" type="button" data-id="{{ $teacher->id }}">Edit</a>
                                <a href="{{ url('/ourschool-admin/teacher/delete', $teacher['id']) }}"
                                    class="delete btn btn-danger" type="button" data-id="{{ $teacher->id }}"
                                    onclick="return confirm('Are you sure to delete this?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
