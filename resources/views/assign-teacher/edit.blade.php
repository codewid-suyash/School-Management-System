@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Assign Teacher To Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Assign Teacher</li>
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
                                <h3 class="card-title">Edit Assign Teacher</h3>
                            </div>


                            <form method="post" action="{{ route('assign-teacher.update', $assign_teacher->id) }}">
                                @csrf
                                <div class="card-body row">
                                    <div class="form-group col-md-4">

                                        <label for="exampleInputEmail1">Class</label>

                                        <select name="class_id" id="class_id" class="form-control">
                                            <option disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == $assign_teacher->class_id ? 'selected' : '' }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('class_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Subject</label>
                                        <select name="subject_id" id="subject_id" class="form-control">
                                            <option disabled selected>Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->subject->id }}" {{ $subject->subject->id == $assign_teacher->subject_id ? 'selected' : '' }}>{{ $subject->subject->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('subject_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Teachers</label>

                                        <select name='teacher_id' id="teacher_id" class='form-control'>
                                                <option disabled selected>Select Teacher</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value='{{ $teacher->id }}' {{ $teacher->id == $assign_teacher->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                                @endforeach
                                        </select>

                                        @error('teacher_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
