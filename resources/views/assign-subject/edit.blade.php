@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Assign Subject To Class</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Update Assign Subject</li>
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
              <h3 class="card-title">Update Assign Subject</h3>
            </div>


            <form method="post" action="{{route('assign-subject.update', $assignSubject->id)}}">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Class</label>
                  <select name="class_id" class="form-control">
                    <option selected disabled>Select Class</option>
                    @foreach($classes as $class)
                      <option value="{{$class->id}}"{{ $class->id == $assignSubject->class_id ? ' selected' : '' }}>{{$class->name}}</option>
                    @endforeach
                  </select>
                  @error('class_id')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="subject_id">Subject</label>
                    <select name="subject_id" class="form-control">
                      <option selected disabled>Select Subjects</option>
                    @foreach ($subjects as $subject)
                      <option value="{{$subject->id}}" {{ $subject->id == $assignSubject->subject_id ? 'selected' : '' }}>
                        {{$subject->name}}
                    </option>
                    @endforeach
                    </select>
                      @error('subject_id')
                    <p class="text-danger">{{$message}}</p>
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

<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>

@endsection
