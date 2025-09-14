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
                        <h1>Timetable</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Timetable List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><a href="{{ route('timetable.create') }}">Create Timetable</a> </h3>
                            </div>

                            <div class="card-header">

                                <form action="" method="GET">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="class_id">Class</label>
                                            <select name="class_id" id="class_id" class="form-control">
                                                <option disabled selected>Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                                        {{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="subject_id">Subject</label>
                                            <select name="subject_id" id="subject_id" class="form-control">
                                                <option disabled selected>Select Subject</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->subject->id }}"
                                                        {{ request('subject_id') == $subject->subject->id ? 'selected' : '' }}>
                                                        {{ $subject->subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 d-flex align-items-end">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success me-2">Filter</button>
                                                <button onclick="window.location='{{ route('timetable.read') }}'"
                                                    type="reset" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($timetables as $item)
                                            <tr>
                                                <th>{{ $loop->iteration }} </th>
                                                <th>{{ $item->class->name }} </th>
                                                <th>{{ $item->subject->name }} </th>
                                                <th>{{ $item->day->name }} </th>
                                                <th>{{\Carbon\Carbon::createFromFormat('H:i:s',$item->start_time)->format('h:i A')}}</th>
                                                <th>{{ \Carbon\Carbon::createFromFormat('H:i:s',$item->end_time)->format('h:i A') }} </th>
                                                <th>{{ $item->room_no }} </th>
                                                <th>
                                                    <a class="btn btn-danger"
                                                        href="{{ route('timetable.delete', $item->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                                </th>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>

                        </div>

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


<script>
    $('#class_id').change(function(){
        var class_id = $(this).val();
        $.ajax({
            url:"{{ route('findSubject') }}",
            type:"get",
            data:{class_id},
            dataType:'json',
            success:function(response){
                // console.log(response);

//both are correct
                //first method to append options//

                // $('#subject_id').empty();
                // $('#subject_id').append('<option disabled selected>Select Subject</option>');
                // $.each(response.subjects, function(key, value){
                //     $('#subject_id').append('<option value="'+value.subject_id+'">'+value.subject.name+'</option>');
                // });

                //second
                $('#subject_id').find('option').not(':first').remove();
                $.each(response['subjects'],(key,item)=>{
                    $('#subject_id').append(`
                    <option value="${item.subject_id}">${item.subject.name}</option>
                    `)
                })
            }
        })
    })
    </script>
@endsection
