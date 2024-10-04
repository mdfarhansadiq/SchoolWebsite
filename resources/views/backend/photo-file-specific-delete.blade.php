@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Photo File')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Album Title - {{ $data->title }}</strong>
            </div>
            <div class="card-body card-block">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Serial No.</th>

                            <th scope="col">Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $file_links = explode(',', $data->file_link);
                        @endphp
                        @foreach ($file_links as $key => $link_Id)
                            <tr>
                                @php
                                    $link_Id = trim($link_Id);
                                @endphp
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>
                                    <img src="https://drive.google.com/thumbnail?id={{ $link_Id }}"
                                        alt="{{ $data->title }}">
                                    <input type="hidden" id="fileId_{{ $key }}" value="{{ $data->id }}">
                                </td>
                                <td><button class="deleteBtn btn btn-danger" type="button"
                                        id="deleteBtn_{{ $key }}" data-id="{{ $link_Id }}">Delete</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- <div class="card">
            <div class="card-header">
                <strong>Lecture/Note File - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">File</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $file)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>

                                <td>{{ $file->title }}</td>
                                <td>@php
                                    $file_links = explode(',', $file->file_link);
                                @endphp
                                    @foreach ($file_links as $link_Id)
                                        @php
                                            $link_Id = trim($link_Id);
                                        @endphp
                                        <img src="https://drive.google.com/thumbnail?id={{ $link_Id }}"
                                            alt="{{ $file->title }}">
                                        <br>
                                        <br>
                                    @endforeach
                                </td>
                                <td><a href="{{ url('/ourschool-admin/lecture-note-file/edit', $file['id']) }}"
                                        class="edit btn btn-primary" type="button" data-id="{{ $file->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/lecture-note-file/delete', $file['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $file->id }}"
                                        onclick="return confirm('Are you sure to delete this class video?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.deleteBtn').click(function() {
                // Get the 'data-id' from the button (which contains the file link ID)
                var confirmDelete = confirm("Are you sure you want to delete this photo?");

                if (confirmDelete) {

                    var fileId = $(this).data('id');

                    // Get the 'key' of the clicked button by extracting from its ID
                    var key = $(this).attr('id').split('_')[1];

                    // Get the hidden input value using the dynamically constructed ID
                    var id = $('#fileId_' + key).val();



                    // Proceed with the AJAX request
                    $.ajax({
                        url: '/ourschool-admin/photo-file-specific/delete/post', // URL of your Laravel route
                        type: 'POST', // Use POST for sending data
                        data: {
                            id: id,
                            fileId: fileId, // Send the file ID
                            _token: "{{ csrf_token() }}" // Laravel CSRF token
                        },
                        success: function(response) {
                            // Handle the successful response
                            // $('#dataTable').empty();
                            $.each(response.files, function(index, file) {
                                $('#dataTable').append(`
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td>
                                <img src="https://drive.google.com/thumbnail?id=${file.link_Id}" alt="${file.title}">
                                <input type="hidden" id="fileId_${index}" value="${file.id}">
                            </td>
                            <td>
                                <button class="deleteBtn btn btn-danger" type="button" id="deleteBtn_${index}" data-id="${file.link_Id}">Delete</button>
                            </td>
                        </tr>
                    `);
                            });
                        },
                        error: function(xhr) {
                            // Handle any errors
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
