@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Subject</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('error'))
                            <div class="alert alert-danger">
                                {{ session::get('error') }}
                            </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Subject</h3>
                            </div>


                            <form method="post" action="{{ route('subject.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Subject Name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Type</label>
                                        <select name="type" class="form-control" id="type">
                                            <option value="" disabled selected>Select Subject Type</option>
                                            <option value="theory">Theory</option>
                                            <option value="practical">Practical</option>
                                        </select>
                                        @error('type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('customJs')
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
