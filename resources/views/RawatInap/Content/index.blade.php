@extends('index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Menu -->
    @include('RawatInap.Layout.menu')
    <!-- /.menu -->

    <!-- Main content -->
    <div class="content">
        <div background="" class="row">
          <img src="{{('images/bg.jpg')}}" width="100%">
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection