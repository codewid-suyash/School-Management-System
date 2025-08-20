@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Teacher</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit Teacher</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          @if(Session::get('success'))
          <div class="alert alert-success">
            {{session::get('success')}}
          </div>
          @endif
          @if(Session::get('error'))
          <div class="alert alert-danger">
            {{session::get('error')}}
          </div>
          @endif
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Teacher</h3>
            </div>


            <form method="post" action="{{route('teacher.update', $teacher->id)}}">
              @csrf
              <div class="card-body row">

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{old('name', $teacher->name)}}">
                  </div>
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father Name" value="{{old('father_name', $teacher->father_name)}}">
                  </div>
                  @error('father_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Mother Name</label>
                    <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother Name" value="{{old('mother_name', $teacher->mother_name)}}">
                  </div>
                  @error('mother_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile No</label>
                    <input type="number" name="mob_no" class="form-control" id="mob_no" placeholder="Enter Mobile No" value="{{old('mob_no', $teacher->mob_no)}}">
                  </div>
                  @error('mob_no')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher DOB</label>
                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter Date of Birth" value="{{old('dob', $teacher->dob)}}">
                  </div>
                  @error('dob')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" value="{{old('email', $teacher->email)}}">
                  </div>
                  @error('email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Teacher</button>
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
