@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Announcement Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Update Announcement</li>
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
              <h3 class="card-title">Update Announcement</h3>
            </div>


            <form method="post" action="{{route('announcement.update', $announcement->id)}}">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Message</label>
                  <input type="text" name="message" class="form-control" id="title" placeholder="Enter Announcement Message" value="{{$announcement->message}}">
                 @error('message')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Broadcast To</label>
                  <select name="type" class="form-control" id="type">
                    <option value="" disabled selected>Select Broadcast Type</option>
                    <option value="teacher" {{ $announcement->type == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="student" {{ $announcement->type == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="parent" {{ $announcement->type == 'parent' ? 'selected' : '' }}>Parent</option>
                  </select>
                  @error('type')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Message</button>
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
