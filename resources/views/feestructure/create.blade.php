@extends('admin.layout')
@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Fees Structure</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Fees Structure</li>
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
              <h3 class="card-title">Add Fees Structure</h3>
            </div>


            <form method="post" action="{{route('fee-structure.store')}}">
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
                  <label>Fee Head</label>
                  <select class="form-control" name="fee_head_id" id="fee_head_id">
                    <option value="" selected disabled>Select Fee Head</option>
                    @foreach($fee_heads as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                @error('fee_head_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
          

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">April Fees</label>
                    <input type="text" name="april" class="form-control" id="april" placeholder="Enter April Fees">
                  </div>
                  @error('april')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">May Fees</label>
                    <input type="text" name="may" class="form-control" id="may" placeholder="Enter May Fees">
                  </div>
                  @error('may')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">June Fees</label>
                    <input type="text" name="june" class="form-control" id="june" placeholder="Enter June Fees">
                  </div>
                  @error('june')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">July Fees</label>
                    <input type="text" name="july" class="form-control" id="july" placeholder="Enter July Fees">
                  </div>
                  @error('july')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">August Fees</label>
                    <input type="text" name="august" class="form-control" id="August" placeholder="Enter August Fees">
                  </div>
                  @error('august')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">September Fees</label>
                    <input type="text" name="september" class="form-control" id="september" placeholder="Enter September Fees">
                  </div>
                  @error('september')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">October Fees</label>
                    <input type="text" name="october" class="form-control" id="October" placeholder="Enter October Fees">
                  </div>
                  @error('october')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">November Fees</label>
                    <input type="text" name="november" class="form-control" id="November" placeholder="Enter November Fees">
                  </div>
                  @error('november')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">December Fees</label>
                    <input type="text" name="december" class="form-control" id="december" placeholder="Enter December Fees">
                  </div>
                  @error('december')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">January Fees</label>
                    <input type="text" name="january" class="form-control" id="january" placeholder="Enter January Fees">
                  </div>
                  @error('january')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">February Fees</label>
                    <input type="text" name="february" class="form-control" id="february" placeholder="Enter February Fees">
                  </div>
                  @error('february')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="card-body col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">March Fees</label>
                    <input type="text" name="march" class="form-control" id="march" placeholder="Enter March Fees">
                  </div>
                  @error('march')
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