@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Student</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit Student</li>
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
              <h3 class="card-title">Update Student</h3>
            </div>


            <form method="post" action="{{route('student.update', $student->id)}}">
              @csrf
              <div class="card-body row">
                  

              <div class="card-body col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Class</label>
                  <select class="form-control" name="class_id" id="class_id">
                    <option value="" selected disabled>Select Class</option>
                    @foreach($classes as $class)
                      <option value="{{$class->id}}"{{ $class->id == $student->class_id ? ' selected' : '' }}>{{$class->name}}</option>
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
                      <option value="{{$item->id}}"{{ $item->id == $student->academic_year_id ? ' selected' : '' }}>{{$item->name}}</option>
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
                  <input type="date" name="admission_date" class="form-control" id="admission_date" placeholder="Enter Admission Date" value="{{old('admission_date', $student->admission_date)}}">
                </div>
                @error('admission_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
          

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{old('name', $student->name)}}">
                  </div>
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father Name" value="{{old('father_name', $student->father_name)}}">
                  </div>
                  @error('father_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Mother Name</label>
                    <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother Name" value="{{old('mother_name', $student->mother_name)}}">
                  </div>
                  @error('mother_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile No</label>
                    <input type="number" name="mob_no" class="form-control" id="mob_no" placeholder="Enter Mobile No" value="{{old('mob_no', $student->mob_no)}}">
                  </div>
                  @error('mob_no')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student DOB</label>
                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter Date of Birth" value="{{old('dob', $student->dob)}}">
                  </div>
                  @error('dob')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" value="{{old('email', $student->email)}}">
                  </div>
                  @error('email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Student</button>
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