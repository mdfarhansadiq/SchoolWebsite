@extends('backend.layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Teacher Info - Form</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data"
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
                            @foreach ($teacheraccount as $acc)
                                <option value="{{ $acc->id }}"
                                    {{ $teacher->teacher_acc_id == $acc->id ? 'selected' : '' }}>
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
                            class="form-control" value="{{ old('teacherName', $teacher->name) }}">
                        <small class="form-text text-muted">Please enter the teacher name.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherposition" class="col-md-3 col-form-label">Designation/Position</label>
                    <div class="col-md-9">
                        <input type="text" id="teacherposition" name="teacherPosition"
                            placeholder="Enter the teacher Position" class="form-control"
                            value="{{ old('teacherPosition', $teacher->position) }}">
                        <small class="form-text text-muted">Please enter the teacher position.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contact-info" class="col-md-3 col-form-label">Contact Info</label>
                    <div class="col-md-9">
                        <textarea name="teacherContact" id="contact-info" rows="7" placeholder="Enter the contact information"
                            class="editor form-control">{{ old('teacherContact', $teacher->contact_info) }}</textarea>
                        <small class="form-text text-muted">Please enter the teacher contact info</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherexperienceyear" class="col-md-3 col-form-label">Years of Experience</label>
                    <div class="col-md-9">
                        <input type="number" id="teacherexperienceyear" name="teacherYearExp"
                            placeholder="Enter the years of Experience" class="form-control"
                            value="{{ old('teacherYearExp', $teacher->years_of_experience) }}">
                        <small class="form-text text-muted">Please enter the teacher years of Experience.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="education-qualification" class="col-md-3 col-form-label">Educational Qualification</label>
                    <div class="col-md-9">
                        <textarea name="teacherEducation" id="education-qualification" rows="3"
                            placeholder="Enter the educational qualification" class="editor form-control">{{ old('teacherEducation', $teacher->educational_qualification) }}</textarea>
                        <small class="form-text text-muted">Please enter the teacher educational qualification</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherteachingsubject" class="col-md-3 col-form-label">Teaching Subjects</label>
                    <div class="col-md-9">
                        <input type="text" id="teacherteachingsubject" name="teacherTeachingSubject"
                            placeholder="Please use ',' comma to enter the multiple teaching subjects of the teacher."
                            class="form-control" value="{{ old('teacherTeachingSubject', $teacher->teaching_subjects) }}">
                        <small class="form-text text-muted">Please use ',' comma to enter the multiple teaching subjects of
                            the teacher.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url-input" class="col-md-3 col-form-label">Photo (Google Drive link)</label>
                    <div class="col-md-9">
                        <input type="text" id="url-input" name="teacherPhoto" placeholder="Enter the Google drive link"
                            class="form-control" value="{{ old('teacherPhoto', $teacher->photo_link) }}">
                        <small class="form-text text-muted">Please enter the Google drive link</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacheractivestatus" class="col-md-3 col-form-label">Publish Status</label>
                    <div class="col-md-9">
                        <input type="checkbox" id="teacheractivestatus" name="teacherStatus" value="1"
                            class="form-check-input" {{ $teacher->active_status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>

                <div class="form-footer text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
