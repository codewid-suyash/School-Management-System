@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Timetable Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Timetable</li>
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
                                <h3 class="card-title">Add Timetable</h3>
                            </div>


                            <form method="post" action="{{ route('timetable.store') }}">
                                @csrf
                                <div class="card-body row">
                                    <div class="form-group col-md-6">

                                        <label for="exampleInputEmail1">Class</label>

                                        <select name="class_id" id="class_id" class="form-control">
                                            <option disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('class_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Subject</label>
                                        <select name="subject_id" id="subject_id" class="form-control">
                                            <option disabled selected>Select Subject</option>
                                                 {{-- @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                 @endforeach --}}
                                        </select>

                                        @error('subject_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <table class="table table-bordered col-md-12">
                                       <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i = 1;
                                            @endphp
                                        @foreach ($days as $day)
                                            <tr>
                                                <td>
                                                    {{ $day->name }}
                                                    <input type="hidden" name="timetable[{{ $i }}][day_id]" value="{{ $day->id }}">
                                                </td>
                                                <td><input type="time" name="timetable[{{ $i }}][start_time]" class="form-control"></td>
                                                <td><input type="time" name="timetable[{{ $i }}][end_time]" class="form-control"></td>
                                                <td><input type="text" name="timetable[{{ $i }}][room_no]" class="form-control" placeholder="Room Number"></td>
                                            </tr>
                                        @php
                                        $i++;
                                        @endphp
                                        @endforeach
                                        </tbody>
                                    </table>

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

<script>
    $('#class_id').change(function(){
        var class_id = $(this).val();
        $.ajax({
            url:"{{ route('findSubject') }}",
            type:"get",
            data:{class_id},
            dataType:'json',
            success:function(response){
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
