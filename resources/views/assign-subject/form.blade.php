@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Assign Subject To Class</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Assign Subject</li>
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
              <h3 class="card-title">Add Assign Subject</h3>
            </div>


            <form method="post" action="{{route('assign-subject.store')}}">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Class</label>
                  <select name="class_id" class="form-control">
                    <option value="">Select Class</option>
                    @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                  </select>
                  @error('class_id')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject</label>
                    @foreach ($subjects as $subject)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subject_id[]" value="{{$subject->id}}" id="subject_{{$subject->id}}">
                            <label class="form-check-label" for="subject_{{$subject->id}}">
                                {{$subject->name}}
                            </label>
                        </div>
                    @endforeach
                      @error('subject_id')
                    <p class="text-danger">{{$message}}</p>
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
