@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Lecture Note File')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Class Lecture/Note - Form</strong>
            </div>
            <div class="card-body card-block">
                <!-- Make sure the action is pointed to the update route -->
                <form action="{{route('admin.lecture-note-file.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                        <label for="classnumber" class="col-md-3 col-form-label">Class Level</label>
                        <div class="col-md-9">
                            <select id="classnumber" name="classNumber" class="form-control">
                                <option value="" disabled>Select the class level</option>
                                @foreach ($classnumber as $num)
                                    <option value="{{ $num->id }}" {{ $data->class_number_id == $num->id ? 'selected' : '' }}>{{ $num->class_number }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please select the class level.</small>
                            @error('classNumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="classsection" class="col-md-3 col-form-label">Class Section</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="classSection" id="classsection">
                                <option value="" disabled>Select a class section</option>
                                @foreach ($classsection as $sec)
                                    <option value="{{ $sec->id }}" {{ $data->class_section_id == $sec->id ? 'selected' : '' }}>{{ $sec->class_section }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please select the class section.</small>
                            @error('classSection')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="classlecturenotetitle" class="col-md-3 col-form-label">Lecture/Note Title</label>
                        <div class="col-md-9">
                            <input type="text" id="classlecturenotetitle" name="classLectureNoteTitle"
                                value="{{ old('classLectureNoteTitle', $data->title) }}"
                                placeholder="Enter the class lecture/note title" class="form-control">
                            <small class="form-text text-muted">Please enter the class lecture/note title.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="classlecturenotelink" class="col-md-3 col-form-label">Google Drive File Link</label>
                        <div class="col-md-9">
                            <textarea name="classLectureNotelink" id="classlecturenotelink" rows="5" class="form-control">{{ old('classLectureNotelink', $data->file_link) }}</textarea>
                            <small class="form-text text-muted">Please use ',' comma after every class lecture/note link if there are multiple links.</small>
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
    </div>

@endsection



@push('js')
<script>
    $(document).ready(function() {
        // Store the current section ID to set as selected
        var currentSectionId = "{{ old('classSection', $data->class_section_id) }}";

        // Fetch Class Sections on Class Level Change
        $('#classnumber').change(function() {
            var class_number_id = $(this).val();
            if (class_number_id) {
                $.ajax({
                    url: '/ourschool-admin/lecture-note-file/select-data/' + class_number_id,
                    type: 'GET',
                    success: function(data) {
                        $('#classsection').empty().append(
                            '<option value="" disabled>Select a class section</option>');

                        // Populate the sections and set the selected option
                        $.each(data, function(id, class_section) {
                            if (id == currentSectionId) {
                                $('#classsection').append('<option value="' + id +
                                    '" selected>' + class_section + '</option>');
                            } else {
                                $('#classsection').append('<option value="' + id +
                                    '">' + class_section + '</option>');
                            }
                        });
                    },
                    error: function() {
                        alert('Error fetching class sections. Please try again.');
                    }
                });
            }
        });

        // Trigger the change event to populate the sections if a class is selected (for edit form)
        if ($('#classnumber').val()) {
            $('#classnumber').trigger('change');
        }
    });
</script>
@endpush
