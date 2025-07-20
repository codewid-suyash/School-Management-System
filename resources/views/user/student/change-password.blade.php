@extends('user.student.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Change Password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Change Password</li>
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
              <h3 class="card-title">Change Password</h3>
            </div>


            <form method="post" action="{{route('student.update-password')}}">
                @csrf
              <div class="card-body row">
                 <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">Old Password</label>
                  <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter Old Password">
                    @error('old_password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">New Password</label>
                  <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter New Password">
                    @error('new_password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm New Password">
                    @error('password_confirmation')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
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
