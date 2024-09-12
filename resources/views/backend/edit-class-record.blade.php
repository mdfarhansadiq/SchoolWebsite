@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Class video')

@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Class Video - Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.class-record.update', $data->id) }}" method="post" enctype="multipart/form-data"
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

                    <!-- Class Level Selection -->
                    <div class="form-group row">
                        <label for="classnumber" class="col-md-3 col-form-label">Class Level</label>
                        <div class="col-md-9">
                            <select id="classnumber" name="classNumber" class="form-control">
                                <option value="" disabled>Select the class level</option>
                                @foreach ($classnumber as $num)
                                    <option value="{{ $num->id }}" @if ($data->class_number_id == $num->id) selected @endif>
                                        {{ $num->class_number }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please select the class level.</small>
                            @error('classNumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Class Section Selection -->
                    <div class="form-group row">
                        <label for="classsection" class="col-md-3 col-form-label">Class Section</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="classSection" id="classsection"
                                aria-label="Default select example" style="color: black">
                                <option value="" disabled>Select a class section</option>
                                <!-- Options will be dynamically populated by JavaScript -->
                            </select>
                            <small class="form-text text-muted">Please select the class section.</small>
                            @error('classSection')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Class Title Input -->
                    <div class="form-group row">
                        <label for="classtitle" class="col-md-3 col-form-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" id="classtitle" value="{{ old('classTitle', $data->title) }}"
                                name="classTitle" placeholder="Enter the class title" class="form-control">
                            <small class="form-text text-muted">Please enter the class title.</small>
                            @error('classTitle')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Class Video Link Input -->
                    <div class="form-group row">
                        <label for="classvideolink" class="col-md-3 col-form-label">Class Video Link</label>
                        <div class="col-md-9">
                            <input type="text" id="classvideolink"
                                value="{{ old('classVideoLink', $data->video_link) }}" name="classVideoLink"
                                placeholder="Enter the class video link" class="form-control">
                            <small class="form-text text-muted">Please enter the class link.</small>
                            @error('classVideoLink')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Update
                        </button>
                    </div>
                </form>

            </div>
            <div class="card-body card-block">
                <div class="form-group row">
                    <label for="classvideo" class="col-md-3 col-form-label">Class Video</label>
                    <div class="col-md-9">
                        <iframe width="460" height="315" src="https://www.youtube.com/embed/{{ $data->video_link }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                    </div>
                </div>
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
                        url: '/ourschool-admin/class-record/select-data/' + class_number_id,
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
