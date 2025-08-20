@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Teacher</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Teacher</li>
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
              <h3 class="card-title">Add Teacher</h3>
            </div>


            <form method="post" action="{{route('teacher.store')}}">
              @csrf
              <div class="card-body row">

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father Name">
                  </div>
                  @error('father_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Mother Name</label>
                    <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother Name">
                  </div>
                  @error('mother_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile No</label>
                    <input type="number" name="mob_no" class="form-control" id="mob_no" placeholder="Enter Mobile No">
                  </div>
                  @error('mob_no')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher DOB</label>
                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter Date of Birth">
                  </div>
                  @error('dob')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address">
                  </div>
                  @error('email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                  </div>
                  @error('password')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Teacher</button>
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
