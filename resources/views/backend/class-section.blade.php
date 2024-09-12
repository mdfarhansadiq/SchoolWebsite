@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Class Section')

@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Class Section - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.class-section.create') }}" method="post" enctype="multipart/form-data"
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
                        <label for="classnumber" class="col-md-3 col-form-label">Class Level</label>
                        <div class="col-md-9">
                            <select id="classnumber" name="classNumber" class="form-control">
                                <option value="" disabled selected>Select the class level</option>
                                @foreach ($classnumber as $num)
                                    <option value="{{ $num->id }}">{{ $num->class_number }}</option>
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
                        <div class="col-md-9">
                            <input type="text" id="classsection" name="classSection"
                                placeholder="Enter the class section" class="form-control">
                            <small class="form-text text-muted">Please enter the class section.</small>
                            @error('classSection')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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

        {{-- Uncomment and complete the data table section if needed --}}

        <div class="card">
            <div class="card-header">
                <strong>Class Section - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Class Level</th>
                            <th scope="col">Class Section</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classsection as $key => $dt)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>Class - {{ $dt->classNumber->class_number }}</td>
                                <td>Section - {{ $dt->class_section }}</td>
                                <td>
                                    <a href="{{ url('/ourschool-admin/class-section/edit', $dt['id']) }}"
                                        class="edit btn btn-primary" type="button" data-id="{{ $dt->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/class-section/delete', $dt['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $dt->id }}"
                                        onclick="return confirm('Are you sure to delete this class section?')">Delete</a>
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
