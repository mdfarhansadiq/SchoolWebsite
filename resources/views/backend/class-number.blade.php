@extends('backend.layout.master')

@push('css')
    <style>
        .form-footer.text-center {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

@section('title', 'Class Level')

@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Class Level - Form</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('admin.class-number.create') }}" method="post" enctype="multipart/form-data"
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
                            <input type="number" id="classnumber" name="classNumber" placeholder="Enter the class level"
                                class="form-control">
                            <small class="form-text text-muted">Please enter the class level.</small>
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
                <strong>Class Level - Data Table</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Class Level</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $dt)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>Class - {{ $dt->class_number }}</td>

                                <td><a href="{{ url('/ourschool-admin/class-number/edit', $dt['id']) }}"
                                        class="edit btn btn-primary" type="button" data-id="{{ $dt->id }}">Edit</a>
                                    <a href="{{ url('/ourschool-admin/class-number/delete', $dt['id']) }}"
                                        class="delete btn btn-danger" type="button" data-id="{{ $dt->id }}"
                                        onclick="return confirm('Are you sure to delete this class level?')">Delete</a>
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
