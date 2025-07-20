@extends('admin.layout')

@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Students List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Students List</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><a href="{{route('student.create')}}">Create New student</a> </h3>
            </div>
            <div class="card">
              <div class="card-body">
                <form action="" method="GET">
                  <div class="row">
                    <!-- Class Dropdown -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="class_id">Class</label>
                        <select class="form-control" name="class_id" id="class_id">
                          <option value="" selected disabled>Select Class</option>
                          @foreach($classes as $class)
                          <option value="{{ $class->id }}" {{ $class->id==request('class_id') ? 'selected' : '' }}>{{ $class->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <!-- Academic Year Dropdown -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="academic_year_id">Academic Year</label>
                        <select class="form-control" name="academic_year_id" id="academic_year_id">
                          <option value="" selected disabled>Select Academic Year</option>
                          @foreach($academic_years as $item)
                          <option value="{{ $item->id }}" {{ $item->id == request('academic_year_id') ? 'selected' : '' }}>{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-md-4 d-flex align-items-end">
                      <div class="form-group">
                        <button type="submit" class="btn btn-success me-2">Filter</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- /.card-header -->
            <!-- Table -->
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                     <th>Name</th>
                    <th>Class</th>
                    <th>Academic Year</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Date of Birth</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Admission Date</th>
                    
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $item )
                  <tr>
                    <th>{{$loop->iteration }} </th>
                    <!-- relationship with classes,academic_years,fee_heads -->
                    <th>{{$item->name}} </th>
                    <th>{{$item->classes->name}} </th>
                    <th>{{$item->academicYear->name}} </th>
                    <th>{{$item->father_name}} </th>
                    <th>{{$item->mother_name}} </th>
                    <th>{{$item->dob}} </th>
                    <th>{{$item->mob_no}} </th>
                    <th>{{$item->email}} </th>
                    <th>{{$item->admission_date}} </th>
                    <th>{{$item->created_at}} </th>
                    <th><a class="btn btn-primary" href="{{route('student.edit',$item->id)}}">Edit</a>
                      <a class="btn btn-danger" href="{{route('student.delete',$item->id)}}" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </th>
                  </tr>
                  @endforeach

                </tbody>

              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </div>

  </section>

</div>
@endsection

@section('customJs')

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>
<script src="dist/js/demo.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection