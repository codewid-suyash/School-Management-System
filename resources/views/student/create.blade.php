@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Student</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Student</li>
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
              <h3 class="card-title">Add Student</h3>
            </div>


            <form method="post" action="{{route('student.store')}}">
              @csrf
              <div class="card-body row">
                  

              <div class="card-body col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Class</label>
                  <select class="form-control" name="class_id" id="class_id">
                    <option value="" selected disabled>Select Class</option>
                    @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                  </select>
                </div>
                 @error('class_id')
                  <p class="text-danger">{{$message}}</p>
                 @enderror
              </div>
             
              <div class="card-body col-md-4">
                <div class="form-group">
                  <label>Academic Year</label>
                  <select class="form-control" name="academic_year_id" id="academic_year_id">
                    <option value="" selected disabled>Select Academic years</option>
                    @foreach($academic_years as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                @error('academic_year_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            

              <div class="card-body col-md-4">
                <div class="form-group">
                  <label>Admission Date</label>
                  <input type="date" name="admission_date" class="form-control" id="admission_date" placeholder="Enter Admission Date">
                </div>
                @error('admission_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
          

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father Name">
                  </div>
                  @error('father_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Mother Name</label>
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
                    <label for="exampleInputEmail1">Student DOB</label>
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
                <button type="submit" class="btn btn-primary">Add Student</button>
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