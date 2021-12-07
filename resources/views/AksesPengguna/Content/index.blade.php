@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('AksesPengguna.Layout.menu')
    <!-- /.menu -->

    <!-- Main content -->
    <div class="content">
      @if(\Session::has('alert-danger-login'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-sign-out-alt"></i><b> Error!!</b></h6>
            {{Session::get('alert-danger-login')}}
        </div>
      @endif
        <div background="" class="row">
          <img src="{{('images/bg.jpg')}}" width="100%">
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection